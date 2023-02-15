<?php

namespace Packages\Animal\EndUser\GetAnimal\Adaptor;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Packages\Animal\EndUser\GetAnimal\UseCase\AnimalGetUseCaseInput;
use Packages\Animal\EndUser\GetAnimal\UseCase\AnimalGetUseCase;

class AnimalGetController extends Controller implements AnimalGetControllerInterface
{
    /**
     * @param AnimalGetUseCase $animalGetUseCase
     */
    public function __construct(
        private readonly AnimalGetUseCase $animalGetUseCase
    )
    {
    }

    /**
     * @param AnimalGetControllerInput $request
     * @return JsonResponse
     */
    public function __invoke(AnimalGetControllerInput $request): JsonResponse
    {
        // リクエストから動物IDを取得
        $id = $request->getId();

        // UseCaseのInput作成
        $input = new AnimalGetUseCaseInput($id);

        // UseCaseに渡し、Output取得
        $useCaseOutput = $this->animalGetUseCase->__invoke($input);

        // コントローラーのOutputを作成
        $controllerOutput = (new AnimalGetControllerOutput($useCaseOutput->getAnimalEntity()));

        // コントローラーのOutputで戻し方指定
        return $controllerOutput->getJsonResponse();
    }
}
