# Animal By Feature on Laravelの巻

---

## 概要

機能単位でパッケージ化し責務範囲の明確化と、 クリーンアーキテクチャも入れてみる。

---

## ファイル構成

- 📁 packages
    - 📁 Animal 機能単位でパッケージを作成
        - 📁 Admin 利用者で別ける
        - 📁 EndUser
            - `RouteServiceProvider.php` Route (Laravelのルート)
            - 📁 AnimalUpdate 機能の操作で別ける
            - 📁 GetAnimal
                - `readme.md`
                - `AnimalServiceProvider.php`　DI設定
                - 📁 Adaptor
                    - `GetAnimalController.php`
                    - `GetAnimalControllerInterface.php`
                    - `GetAnimalOutput.php`　DTO
                    - `GetAnimalInput.php`　DTO (LaravelのFormRequest)
                - 📁 UseCase
                    - `GetAnimalInput.php` DTO
                    - `GetAnimalOutput.php` DTO
                    - `GetAnimalUseCase.php`
                - 📁 Repository
                    - `GetAnimalQueryInterface.php`
                    - 📁 Radis　
                    - 📁 Db
                        - `GetAnimalQuery.php` (LaravelのEloquentからEntityを返す）
                - 📁 Domain
                    - 📁 Entity
                        - `AnimalEntity.php`
                - 📁 Test
                    - 📁 Feature
                        - `GetAnimalTest.php`
                    - 📁 Util
                        - `GetAnimalTest.php`
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

 [RouteServiceProvider.php](app%2FProviders%2FRouteServiceProvider.php) のboot()に[作成したAnimalのルート](Animals%2FAnimal%2FEndUser%2FRouteServiceProvider.php)を追記

```
(new \Animals\Animal\EndUser\RouteServiceProvider())->mapRoutes();
```

 [app.php](config%2Fapp.php) のprovidersに[作成したAnimalのServiceProvider](Animals%2FAnimal%2FEndUser%2FGetAnimal%2FAnimalServiceProvider.php)を追記

```
Animals\Animal\EndUser\GetAnimal\AnimalServiceProvider::class
```


