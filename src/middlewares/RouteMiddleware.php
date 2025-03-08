<?php
namespace App\src\middlewares;

class RouteMiddleware
{
    public function handle(&$request)
    {
        $routes = require __DIR__ . "/../../config/routes.php";
        foreach ($routes as $route) {
            if ($this->validateRoute($request, $route)) {
                $routePathParts = explode("/", trim($route->url, '/'));
                $requestPathParts = explode("/", trim($request->path, '/'));

                if (!$this->matchRouteParts($routePathParts, $requestPathParts, $parameters)) {
                    continue;
                }

                $route->pathParameters = $parameters;
                $request->route = &$route;
                $request->params = $parameters;

                return $route;
            }
        }
        return null;
    }

    private function matchRouteParts($routeParts, $requestParts, &$parameters)
    {
        $parameters = [];

        $requiredPartsCount = 0;
        foreach ($routeParts as $part) {
            if (!$this->isOptionalParameter($part)) {
                $requiredPartsCount++;
            }
        }

        if (count($requestParts) < $requiredPartsCount) {
            return false;
        }

        if (count($requestParts) > count($routeParts)) {
            return false;
        }

        for ($i = 0; $i < count($routeParts); $i++) {
            $routePart = $routeParts[$i];

            if (!isset($requestParts[$i])) {
                if (!$this->isOptionalParameter($routePart)) {
                    return false;
                }
                $paramName = $this->extractParameterName($routePart, true);
                $parameters[$paramName] = null;
                continue;
            }

            $requestPart = $requestParts[$i];

            if (!$this->isParameter($routePart)) {
                if ($routePart !== $requestPart) {
                    return false;
                }
                continue;
            }

            $paramName = $this->extractParameterName($routePart);
            $pattern = $this->extractPattern($routePart);

            if ($pattern && !preg_match('/^' . $pattern . '$/', $requestPart)) {
                return false;
            }

            $parameters[$paramName] = $requestPart;
        }

        return true;
    }

    private function isParameter($part)
    {
        return preg_match('/{.+}/', $part) === 1;
    }

    private function isOptionalParameter($part)
    {
        return preg_match('/{.+\?}/', $part) === 1;
    }

    private function extractParameterName($part, $includeOptional = false)
    {
        if (preg_match('/{([^:?]+)(?:\:.+)?(\?)?}/', $part, $matches)) {
            return $matches[1];
        }
        return null;
    }

    private function extractPattern($part)
    {
        if (preg_match('/{[^:]+:(.+?)(?:\?)?}/', $part, $matches)) {
            return $matches[1];
        }
        return null;
    }

    public function validateRoute($request, $route)
    {
        return $route->isInitialized() && $route->method === $request->method;

    }
}