<?php

namespace Packages\Animal\Admin\AnimalCreate\Adaptor;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Packages\Animal\Admin\AnimalCreate\UseCase\AnimalCreateUseCase;
use Packages\Animal\Admin\AnimalCreate\UseCase\AnimalCreateUseCaseInput;

class AnimalCreateController extends Controller implements AnimalCreateControllerInterface
{
    /**
     * @param AnimalCreateUseCase $AnimalCreateUseCase
     */
    public function __construct(
        private readonly AnimalCreateUseCase $AnimalCreateUseCase
    )
    {
    }

    /**
     * @param AnimalCreateControllerInput $request
     * @return JsonResponse
     */
    public function __invoke(AnimalCreateControllerInput $request): JsonResponse
    {
        // UseCaseに渡し、Output取得
        $useCaseOutput = $this->AnimalCreateUseCase->__invoke(new AnimalCreateUseCaseInput($request->getName(), $request->getWidth()));

        // コントローラーのOutputを作成
        $controllerOutput = (new AnimalCreateControllerOutput($useCaseOutput->AnimalCreateEntity()));

        // コントローラーのOutputで戻し方指定
        return $controllerOutput->getJsonResponse();
    }
}
