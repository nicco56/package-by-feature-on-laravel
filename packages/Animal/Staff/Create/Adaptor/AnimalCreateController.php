<?php

namespace Packages\Animal\Staff\Create\Adaptor;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Packages\Animal\Staff\Create\UseCase\AnimalCreateUseCase;
use Packages\Animal\Staff\Create\UseCase\AnimalCreateUseCaseInput;

class AnimalCreateController extends Controller implements AnimalCreateControllerInterface
{
    /**
     * @param AnimalCreateUseCase $animalCreateUseCase
     */
    public function __construct(
        private readonly AnimalCreateUseCase $animalCreateUseCase
    )
    {
    }

    /**
     * @param AnimalCreateControllerInput $request
     * @return JsonResponse
     */
    public function __invoke(AnimalCreateControllerInput $request): JsonResponse
    {
        $useCaseOutput = $this->animalCreateUseCase->__invoke(
            new AnimalCreateUseCaseInput($request->getName(), $request->getWidth())
        );

        $controllerOutput = (new AnimalCreateControllerOutput($useCaseOutput->getAnimalEntity()));

        return $controllerOutput->getJsonResponse();
    }
}
