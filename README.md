# Package By Feature on Laravelの巻

---

## 概要

機能単位でパッケージ化し責務範囲の明確化と、 クリーンアーキテクチャも入れてみる。

---

## ファイル構成

- 📁 [packages](packages)
    - 📁 [Animal](packages%2FAnimal) **_動物パッケージ_**
        - 📁 Admin 利用者で別け、他の利用者に影響がでないように。
        - 📁 [EndUser](packages%2FAnimal%2FEndUser)
            - [RouteServiceProvider.php](packages%2FAnimal%2FEndUser%2FRouteServiceProvider.php) LaravelのRoute
            - 📁 AnimalUpdate
            - 📁 [AnimalGet](packages%2FAnimal%2FEndUser%2FAnimalGet)　操作で別けて、他の操作に影響がでないようにする。
                - [README.md](packages%2FAnimal%2FEndUser%2FAnimalGet%2FREADME.md)
                - [PackageServiceProvider.php](packages%2FAnimal%2FEndUser%2FAnimalGet%2FPackageServiceProvider.php)
                - 📁 [Adaptor](packages%2FAnimal%2FEndUser%2FAnimalGet%2FAdaptor) **_【コントローラー層】 外部からのinputを受け付ける。_**
                    - [AnimalGetController.php](packages%2FAnimal%2FEndUser%2FAnimalGet%2FAdaptor%2FAnimalGetController.php)
                    - [AnimalGetControllerInterface.php](packages%2FAnimal%2FEndUser%2FAnimalGet%2FAdaptor%2FAnimalGetControllerInterface.php)
                    - [AnimalGetControllerOutput.php](packages%2FAnimal%2FEndUser%2FAnimalGet%2FAdaptor%2FAnimalGetControllerOutput.php)
                    - [AnimalGetControllerInput.php](packages%2FAnimal%2FEndUser%2FAnimalGet%2FAdaptor%2FAnimalGetControllerInput.php) LaravelのFormRequest使用
                - 📁 [UseCase](packages%2FAnimal%2FEndUser%2FAnimalGet%2FUseCase) **_【UseCase層】コントローラー層から呼ばれ、処理を行う。_**
                    - [AnimalGetUseCaseInput.php](packages%2FAnimal%2FEndUser%2FAnimalGet%2FUseCase%2FAnimalGetUseCaseInput.php) 
                    - [AnimalGetUseCaseOutput.php](packages%2FAnimal%2FEndUser%2FAnimalGet%2FUseCase%2FAnimalGetUseCaseOutput.php) 
                    - [AnimalGetUseCase.php](packages%2FAnimal%2FEndUser%2FAnimalGet%2FUseCase%2FAnimalGetUseCase.php)
                - 📁 [Domain](packages%2FAnimal%2FEndUser%2FAnimalGet%2FDomain)　**_【Domain層】UsaCase層から呼ばれ、処理を行う。_**
                    - 📁 [Entity](packages%2FAnimal%2FEndUser%2FAnimalGet%2FDomain%2FEntity)
                        - [AnimalEntity.php](packages%2FAnimal%2FEndUser%2FAnimalGet%2FDomain%2FEntity%2FAnimalEntity.php)
                    - 📁 [Repository](packages%2FAnimal%2FEndUser%2FAnimalGet%2FDomain%2FDomain%2FRepository)
                         - [AnimalGetQueryInterface.php](packages%2FAnimal%2FEndUser%2FAnimalGet%2FDomain%2FRepository%2FAnimalGetQueryInterface.php)
                         - 📁 Radis　
                         - 📁 [DB](packages%2FAnimal%2FEndUser%2FAnimalGet%2FDomain%2FRepository%2FDB)
                             - [AnimalGetQuery.php](packages%2FAnimal%2FEndUser%2FAnimalGet%2FRepository%2FDB%2FAnimalGetQuery.php)
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

## Laravel側で必要な記載


routeディレクトリにpackagesディレクトリを作成

 [composer.json](composer.json) のautoloadにPackages追加

```
"Packages\\": "packages/"
```

 [RouteServiceProvider.php](app%2FProviders%2FRouteServiceProvider.php) のboot()に[パッケージのRoute](packages%2FAnimal%2FEndUser%2FRouteServiceProvider.php)を追記

```
(new \Animals\Animal\EndUser\RouteServiceProvider())->mapRoutes();
```

 [app.php](config%2Fapp.php) のprovidersに[パッケージのPackageServiceProvider](packages%2FAnimal%2FEndUser%2FAnimalGet%2FPackageServiceProvider.php)を追記

```
Animals\Animal\EndUser\AnimalGet\AnimalServiceProvider::class
```


