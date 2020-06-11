<?php

namespace App\Http\Controllers\Api\V1\Admin;

// class Controller
// {
    /**
     * @OA\Info(
     *     description="3PS API Development",
     *     version="1.0.0",
     *     title="3PS Application api development",
     *     termsOfService="http://swagger.io/terms/",
     *     @OA\Contact(
     *         email="admin@admin.com"
     *     ),
     *     @OA\License(
     *         name="Apache 2.0",
     *         url="http://www.apache.org/licenses/LICENSE-2.0.html"
     *     )
     * )
     */
    /** 
    *     @SWG\SecurityScheme(
    *          securityDefinition="passport",
    *          type="oauth2",
    *          in="header",
    *          name="Authorization"
    *      ),
    *     security={
    *       {"passport": {}},
    *   }
    */
  
    class Controller extends BaseController
    {
        use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    }
// }