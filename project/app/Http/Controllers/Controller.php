<?php

namespace App\Http\Controllers;

abstract class Controller
{
    /**
     * Send a standardized JSON response.
     *
     * @param mixed $result
     * @param string $message
     * @param int $code
     * @return \Illuminate\Http\JsonResponse
     */
    protected function sendResponse($result, $message, $code = 200)
    {
        return response()->json([
            'success' => true,
            'data' => $result,
            'message' => $message,
        ], $code);
    }

    /**
     * Send a standardized JSON error response.
     *
     * @param string $error
     * @param int $code
     * @return \Illuminate\Http\JsonResponse
     */
    protected function sendError($error, $code = 400)
    {
        return response()->json([
            'success' => false,
            'message' => $error,
        ], $code);
    }
}
