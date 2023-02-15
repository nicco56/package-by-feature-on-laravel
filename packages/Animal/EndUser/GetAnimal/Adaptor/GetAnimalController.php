<?php

namespace Packages\Animal\EndUser\GetAnimal\Adaptor;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Packages\Animal\EndUser\GetAnimal\UseCase\GetAnimalUseCaseInput;
use Packages\Animal\EndUser\GetAnimal\UseCase\GetAnimalUseCase;

class GetAnimalController extends Controller implements GetAnimalControllerInterface
{
    /**
     * @param GetAnimalUseCase $GetAnimalUseCase
     */
    public function __construct(
        private readonly GetAnimalUseCase $GetAnimalUseCase
    )
    {
    }

    /**
     * @param GetAnimalControllerInput $request
     * @return JsonResponse
     */
    public function __invoke(GetAnimalControllerInput $request): JsonResponse
    {
        // リクエストから動物IDを取得
        $id = $request->getId();

        // UseCaseのInput作成
        $input = new GetAnimalUseCaseInput($id);

        // UseCaseに渡し、Output取得
        $useCaseOutput = $this->GetAnimalUseCase->__invoke($input);

        // コントローラーのOutputを作成
        $controllerOutput = (new GetAnimalControllerOutput($useCaseOutput->getAnimalEntity()));

        // コントローラーのOutputで戻し方指定
        return $controllerOutput->getJsonResponse();
    }
}
