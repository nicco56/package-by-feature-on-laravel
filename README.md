# Package By Feature on Laravelの巻

---

## 概要

機能単位でパッケージ化し責務範囲の明確化と、 クリーンアーキテクチャも入れてみる。

---

## ファイル構成

動物園アプリです。

- 📁 [packages](packages)
    - 📁 Animal **_動物パッケージ_**
        - 📁 Staff 利用者で別け、他の利用者に影響がでないように。
        - 📁 Visitor
            - RouteServiceProvider.php LaravelのRoute
            - 📁 AnimalUpdate
            - 📁 Get　操作で別けて、他の操作に影響がでないようにする。
                - README.md
                - PackageServiceProvider.php
                - 📁 Adaptor **_【コントローラー層】 外部からのinputを受け付ける、outputで戻り型を指定_**
                    - AnimalGetController.php
                    - AnimalGetControllerInterface.php
                    - AnimalGetControllerOutput.php
                    - AnimalGetControllerInput.php LaravelのFormRequest使用
                - 📁 UseCase **_【UseCase層】コントローラー層から呼ばれ、処理を行う。_**
                    - AnimalGetUseCaseInput.php
                    - AnimalGetUseCaseOutput.php
                    - AnimalGetUseCase.php
                - 📁 Domain　**_【Domain層】UsaCase層から呼ばれる。Entityや複雑な業務ロジックなど置いておく_**
                    - 📁 Entity
                        - AnimalEntity.php
                    - 📁 Repository
                         - AnimalGetQueryInterface.php
                         - 📁 Radis
                         - 📁 HogeApi
                         - 📁 DB
                             - AnimalGetQuery.php
                - 📁 Test
                    - 📁 Feature
                        - `AnimalGetTest.php`
                    - 📁 Util
                        - `AnimalGetTest.php`
    - 📁 Core　Coreパッケージ パッケージを跨いで使用可能
        - Modules アプリとしての共通ロジック
          - Selenium
        - Visitor
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

 [RouteServiceProvider.php](app%2FProviders%2FRouteServiceProvider.php) のboot()にパッケージのRouteを追記

```
(new \Animals\Animal\Visitor\RouteServiceProvider())->mapRoutes();
```

 [app.php](config%2Fapp.php) のprovidersにパッケージのPackageServiceProviderを追記

```
Packages\Animal\Visitor\Get\AnimalServiceProvider::class
```


