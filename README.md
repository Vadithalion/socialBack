# socialBack 🚀

![image](./assets/laravel.jpeg)
---
## Backend con tecnología LARAVEL

API para front de una red social, insercion consulta y modificacion de datos en la bbdd

## Tecnologías usadas e instalación 🛠️

* [Laravel](https://laravel.com/docs/7.x) <--- Link a la documentación
* [Passport](https://laravel.com/docs/7.x/passport) <--- Link a la documentación
* [Axios](https://github.com/axios/axios) <--- Link a la documentación

> composer update

ejecuta este comando tras la descarga o clonación para que el proyecto funcione en tu máquina

---

* Para empezar, registra el usuario con la siguiente ruta
(resto de rutas disponibles en el archivo ./routes/api.php)
 
```
Route::prefix('user')->group(function () {

    Route::post('register','UserController@register');
```

* Nuestro backend ofrece para ello el siguiente controlador
(resto de controladores ./app/Http/Controllers/)
```
public function register(Request $request)
    {
        try {
            $body = $request->validate([
                'name' => 'required|string',
                'surname' => 'string',
                'nick' => 'string',
                'email' => 'required|string|email',
                'password' => 'required|string|min:8',
                'role' => 'string',
                'status' => 'string',
                'image' => 'string'
            ]);
            $body['password'] = Hash::make($body['password']);
            $user = User::create($body);
            return response($user, 201);
        } catch (\Exception $e) {
            return response($e, 500);
        }
    }
```



* Siguiente paso, loguear el usuario y conseguir el token (cortesia de la libreria Passport en Laravel)

![image](./assets/login.jpg)


* Para publicar y manipular, necesitaremos estar autenticados

![image](./assets/token.jpg)

* Tras dar follow, tendremos acceso a la visualizacion en nuestro timeline de las publicaciones de los usuarios seguidos.

* Podremos gestionar a los usuarios a los cuales queremos seguir gracias a la tabla FOLLOWS, la cual es una relación de usuarios para/con usuarios


```
Schema::create('follows', function(Blueprint $table){
            $table->id();
            $table->unsignedBigInteger('follower_id');
            $table->unsignedBigInteger('followed_id');
            $table->timestamps();

            $table->foreign('follower_id')->references('id')->on('users');
            $table->foreign('followed_id')->references('id')->on('users');
        });
```

* A continuacion, ejemplo de like en una publicación

![image](./assets/likes.jpg)

* Diseño lógico de la base de datos utilizada.

![image](./assets/bbdd.jpg)






---

## **Autor** ✒️

[Iñigo Vadillo](https://www.linkedin.com/in/i%C3%B1igovadilloruiz/) <--Linkedin