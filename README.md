# Funcionamento básico LARAVEL

### 💭 Resumo breve 
  Aqui você poderá ter uma ideia inicial da organização e funcionamento de um projeto em LARAVEL.

## 📝 Requerimentos (caso opte por rodar a aplicação)

  > IDE de sua escolha (VScode, PhpStorm..)
> 
  > Banco de Dados (MySQL, PostgreSQL..)
> 
  > Composer
> 
  > Linguagem PHP
> 
  
💢 O XAMPP, além de oferecer MySQL e PHP, também fornece um servidor Apache.

Agora que você possui o ambiente montado, crie uma pasta e, em seguida, abra o terminal de sua IDE para introduzir o seguinte comando:

```
laravel new (nome qualquer)
```
🛂 Durante a instalação, será necessário informar o banco de dados que irá ser utilizado.

Agora, nessa próxima etapa para criação do projeto, o Composer é crucial, sendo necessário o seguinte comando no terminal:

```
composer create-project --prefer-dist laravel/laravel nome-do-projeto

```

#### ❗Comandos de verificação (Prompt de Comando)

```
composer -v
laravel-v
```

## 🧑‍🏫 Explicação dos componentes principais

Em 'resources/views', você poderá inserir as telas e layouts de sua aplicação.

A pasta 'include' poderá conter elementos base para as Views, sendo, neste caso, um header.

As outras pastas estarão armazenando arquivos CSS ou Scripts que poderão ser referenciados nas Views.

![image](https://github.com/user-attachments/assets/e4e236e3-4d17-4d64-a22a-863daa6039cf)

No diretório app/Http/Controllers, será trabalhado métodos que manipulam as requisições para login e registro ou quaisquer outras funcionalidades.
```
class ControladorLogRegis extends Controller
{
    public function login()
    {
        return view('login');
    }

    public function registro()
    {
        return view('registro');
    }
}
```
Para cada função ou método, uma rota terá de ser definida, você poderá defini-lás em 'routes/web.php'.

```
use App\Http\Controllers\ControladorLogRegis;

Route::get('/login', [ControladorLogRegis::class, 'login']);
Route::get('/registro', [ControladorLogRegis::class, 'registro']);
```
Para armazenar os Modelos da aplicação (Modelos são uma parte central do padrão de arquitetura Model-View-Controller, sendo responsáveis por interagir com o banco de dados), é utilizada a pasta 'Models', localizada ao lado de 'Http'.

![image](https://github.com/user-attachments/assets/dbec8d32-371c-4a80-ac38-f3c0ba6e8d5c)


Exemplo simples do uso de Models:
```
use App\Models\User;

// criação de novo usuário
$user = new User();
$user->name = 'John Doe';
$user->email = 'john@example.com';
$user->save();

// busca por ID
$user = User::find(1);

// atualização de usuário
$user->name = 'Jane Doe';
$user->save();

// exclusão de usuário
$user->delete();
```

### 📚 Observações

- Comentários no código da aplicação foram adicionados para um melhor entendimento
- Diversas outras configurações não foram esclarecidas aqui, opte pela procura de uma aula caso queira aprender ainda mais
- Este foi meu primeiro contato com LARAVEL, obrigado pela sua atenção até aqui
