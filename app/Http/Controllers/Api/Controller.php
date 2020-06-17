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
         * @OA\SecurityScheme(
         *     @OA\Flow(
         *         flow="clientCredentials",
         *         tokenUrl="oauth/token",
         *         scopes={}
         *     ),
         *     securityScheme="oauth2",
         *     in="header",
         *     type="oauth2",
         *     description="Oauth2 security",
         *     name="oauth2",
         *     scheme="https",
         *     bearerFormat="bearer",
         * )
         */
    class Controller extends BaseController
    {
        use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    }
// }