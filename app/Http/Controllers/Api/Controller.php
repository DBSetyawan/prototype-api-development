<?php

namespace App\Http\Controllers\Api\V1\Admin;

// class Controller
// {

      /**
         * @OA\Info(
         *      version="1.0.0",
         *      title="3PS OpenAPI Documentation",
         *      description="3PS OpenAPI publish",
         *      @OA\Contact(
         *          email="artexsdns@gmail.com"
         *      ),
         *      @OA\License(
         *          name="Nginx 1.19.0",
         *          url="http://nginx.org/LICENSE"
         *      )
         * )
         *
         * @OA\Server(
         *      url=L5_SWAGGER_CONST_HOST,
         *      description="3PS OpenAPI Published",
         * )
        */

         /**
         * @OA\Get(
         *   path="/mySecuredEndpoint",
         *   summary="Secured with passport",
         *   description="Secured with passport",
         *   tags={"Passport Security"},
         *   security={{"passport": {"*"}}},
         *   @OA\Response(
         *     @OA\MediaType(mediaType="application/json"),
         *     response=200,
         *     description="My Response"
         *   ),
         *   @OA\Response(
         *     @OA\MediaType(mediaType="application/json"),
         *     response="default",
         *     description="an ""unexpected"" error"
         *   )
         * )
         */
    class Controller extends BaseController
    {
        use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    }
// }