<?php

namespace Packages\Animal\Staff\LazyArchitecture\Adaptor;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Packages\Animal\Staff\LazyArchitecture\UseCase\AnimalLazyArchitectureUseCase;
use Packages\Animal\Staff\LazyArchitecture\UseCase\AnimalLazyArchitectureUseCaseInput;

class AnimalLazyArchitectureController extends Controller
{
    /**
     * @param AnimalLazyArchitectureControllerInput $request
     * @return JsonResponse
     */
    public function __invoke(AnimalLazyArchitectureControllerInput $request): JsonResponse
    {
        $useCaseInput = new AnimalLazyArchitectureUseCaseInput($request->getName(), $request->getWidth());

        // UseCaseに渡し、Output取得
        $useCaseOutput = (new AnimalLazyArchitectureUseCase())->__invoke($useCaseInput);

        // コントローラーのOutputを作成
        $controllerOutput = (new AnimalLazyArchitectureControllerOutput($useCaseOutput->AnimalLazyArchitectureEntity()));

        // コントローラーのOutputで戻し方指定
        return $controllerOutput->getJsonResponse();
    }
}
