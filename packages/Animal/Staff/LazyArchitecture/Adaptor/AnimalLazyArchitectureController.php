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
        $useCaseOutput = (new AnimalLazyArchitectureUseCase())->__invoke($useCaseInput);
        $controllerOutput = (new AnimalLazyArchitectureControllerOutput($useCaseOutput->getAnimalLazyArchitectureEntity()));
        return $controllerOutput->getJsonResponse();
    }
}
