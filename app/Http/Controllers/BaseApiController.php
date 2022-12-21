<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;

class BaseApiController extends Controller
{
    /**
     * Returns success on call.
     *
     * @param  integer $message
     * @param  array   $data
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function returnsSuccess(string $message, array $data = []): JsonResponse
    {
        $response = [
            'success' => true,
            'message' => $message,
            'data'    => $data,
        ];

        return response()->json($response, 200);
    }

    /**
     * Returns error on call.
     *
     * @param  string  $error
     * @param  array   $extraInfo
     * @param  integer $statusCode
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function returnsError(string $errorMessage, array $extraInfo = [], int $statusCode = 404): JsonResponse
    {
        $response = [
            'success' => false,
            'message' => $errorMessage,
        ];

        if (!empty($extraInfo)) {
            $response['data'] = $extraInfo;
        }

        return response()->json($response, $statusCode);
    }
}
