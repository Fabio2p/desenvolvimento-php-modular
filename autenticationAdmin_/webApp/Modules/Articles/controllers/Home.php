<?php 
defined("_EXEC") or die("Restricted Access!");

class Home extends Controller{

    // Pagina inicial da area administrativa do site.

    public function Index(){

        // Inicia uma sesssao se nao existe.
        App::session();

        if(isset($_SESSION['logado'])):

            // Cria uma instancia da classe model Articles pertencente o modulo artigos
            $model_articles = $this->model('/Articles','Articles');
        
            // recupera o nome do usuario logado
            $dados['nome_usuario'] = $_SESSION['logado']['nome'];
            
            $id = $_SESSION['logado']['id'];

            $nome = $_SESSION['logado']['nome'];

            $dados['artigos'] = $model_articles->showArticles();
            
            
            // Cria uma instancia da classe user groups

            $userGroup = $this->model("/Users","Usergroups");

            $obj = $userGroup->levelUser($id);
            // cria um vetor
            $groups['level'] = $obj;
            
            extract($groups);

            if($level[0]->level == 1):
                
                $dados['usuario'] = "Ola - ". $nome." seja bem vindo!";
                
                $this->view("/Articles",'Registered', $dados);

            elseif($level[0]->level == 2):
                
                $dados['usuario'] = "Ola - ". $nome." seja bem vindo!";

                $this->view("/Articles",'Publisher', $dados);

            elseif($level[0]->level == 3):

                $dados['usuario'] = "Administrador - ". $nome." seja bem vindo!";

                $this->view("/Articles",'Administrator', $dados);

            else:
                
                echo "Profile not found!";
            endif;

            exit();

        else:
           App::session_destroy();
        endif;    
        
    }

    public function editArticle(){

    }

    public function newArticle(){

    }
}
?>