# Animal By Feature on Laravelの巻

---

## 概要

機能単位でパッケージ化し責務範囲の明確化と、 クリーンアーキテクチャも入れてみる。

---

## ファイル構成

- 📁 [packages](packages)
    - 📁 [Animal](packages%2FAnimal) 機能単位でパッケージを作成
        - 📁 Admin 利用者で別ける
        - 📁 [EndUser](packages%2FAnimal%2FEndUser)
            - [RouteServiceProvider.php](packages%2FAnimal%2FEndUser%2FRouteServiceProvider.php) Route (Laravelのルート)
            - 📁 AnimalUpdate 機能の操作で別ける
            - 📁 [AnimalGet](packages%2FAnimal%2FEndUser%2FAnimalGet)
                - [README.md](packages%2FAnimal%2FEndUser%2FAnimalGet%2FREADME.md)
                - [PackageServiceProvider.php](packages%2FAnimal%2FEndUser%2FAnimalGet%2FPackageServiceProvider.php)　DI設定
                - 📁 [Adaptor](packages%2FAnimal%2FEndUser%2FAnimalGet%2FAdaptor)
                    - [AnimalGetController.php](packages%2FAnimal%2FEndUser%2FAnimalGet%2FAdaptor%2FAnimalGetController.php)
                    - [AnimalGetControllerInterface.php](packages%2FAnimal%2FEndUser%2FAnimalGet%2FAdaptor%2FAnimalGetControllerInterface.php)
                    - [AnimalGetControllerOutput.php](packages%2FAnimal%2FEndUser%2FAnimalGet%2FAdaptor%2FAnimalGetControllerOutput.php)　DTO
                    - [AnimalGetControllerInput.php](packages%2FAnimal%2FEndUser%2FAnimalGet%2FAdaptor%2FAnimalGetControllerInput.php)　DTO (LaravelのFormRequest)
                - 📁 [UseCase](packages%2FAnimal%2FEndUser%2FAnimalGet%2FUseCase)
                    - [AnimalGetUseCaseInput.php](packages%2FAnimal%2FEndUser%2FAnimalGet%2FUseCase%2FAnimalGetUseCaseInput.php)`AnimalGetInput.php` DTO
                    - [AnimalGetUseCaseOutput.php](packages%2FAnimal%2FEndUser%2FAnimalGet%2FUseCase%2FAnimalGetUseCaseOutput.php) DTO
                    - [AnimalGetUseCase.php](packages%2FAnimal%2FEndUser%2FAnimalGet%2FUseCase%2FAnimalGetUseCase.php)
                - 📁 [Repository](packages%2FAnimal%2FEndUser%2FAnimalGet%2FRepository)
                    - [AnimalGetQueryInterface.php](packages%2FAnimal%2FEndUser%2FAnimalGet%2FRepository%2FAnimalGetQueryInterface.php)`AnimalGetQueryInterface.php`
                    - 📁 Radis　
                    - 📁 [DB](packages%2FAnimal%2FEndUser%2FAnimalGet%2FRepository%2FDB)
                        - [AnimalGetQuery.php](packages%2FAnimal%2FEndUser%2FAnimalGet%2FRepository%2FDB%2FAnimalGetQuery.php) (LaravelのEloquentからEntityを返す）
                - 📁 [Domain](packages%2FAnimal%2FEndUser%2FAnimalGet%2FDomain)
                    - 📁 [Entity](packages%2FAnimal%2FEndUser%2FAnimalGet%2FDomain%2FEntity)
                        - [AnimalEntity.php](packages%2FAnimal%2FEndUser%2FAnimalGet%2FDomain%2FEntity%2FAnimalEntity.php)`AnimalEntity.php`
                - 📁 Test
                    - 📁 Feature
                        - `AnimalGetTest.php`
                    - 📁 Util
                        - `AnimalGetTest.php`
    - 📁 Core　Coreパッケージ パッケージを跨いで使用可能
        - Modules アプリとしての共通ロジック
          - Selenium
        - EndUser
            - Auth
                - ….
            - Responce
                - ApiResponce
                    - json化や共通フォーマット


---

## Laravel側で必要な処理


 routeにAnimalsディレクトリを作成

 [composer.json](composer.json) のautoloadにAnimals追加

```
"Animals\\": "Animals/"
```

 [RouteServiceProvider.php](app%2FProviders%2FRouteServiceProvider.php) のboot()に[パッケージのRouteを](packages%2FAnimal%2FEndUser%2FRouteServiceProvider.php)を追記

```
(new \Animals\Animal\EndUser\RouteServiceProvider())->mapRoutes();
```

 [app.php](config%2Fapp.php) のprovidersに[パッケージのPackageServiceProvider](packages%2FAnimal%2FEndUser%2FAnimalGet%2FPackageServiceProvider.php)を追記

```
Animals\Animal\EndUser\AnimalGet\AnimalServiceProvider::class
```


