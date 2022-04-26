# Site SEJA

Desenvolvido com Wordpress.

Disponível em [www.sejameuc.com.br](https://www.sejameuc.com.br/).

> **IMPORTANTE**: Este repositório contém apenas os arquivos de tema e plugin. Conteúdo e mídia estão disponíveis somente em produção.

## Tema

A maioria dos arquivos relevantes desse repositório se encontram na pasta de tema (`wp-content/themes/sejameuc`).

Os arquivos são divididos em sub-partes quando necessário pra melhor organização.

Todo o estilo é feito em SCSS, utilizando o plugin [WP-SCSS](#wp-scss).

Outro ponto importante é a adição de tipos de posts customizados através do arquivo `functions.php` (como é o caso dos Eventos).

## Plugins

### Advanced Custom Fields

> [Site Oficial](https://www.advancedcustomfields.com/)

Responsável por adicionar campos extras e esconder alguns campos em páginas específicas e também tipos de posts.

### WP-SCSS

> [Site do Plugin](https://wordpress.org/plugins/wp-scss/)

Converte os arquivos de estilo da pasta `scss` para `css` dentro do tema.

> **IMPORTANTE**: O plugin precisa ser configurado dessa forma após a primeira inicialização

## Desenvolvimento

Para iniciar o servidor de Wordpress com um banco de dados local, basta ter o [Docker](https://www.docker.com/products/docker-desktop/) instalado localmente e rodar a seguinte linha de comando:

```bash
docker compose up -d
```

Se não houverem erros, o site estará disponível em [localhost:8080](http://localhost:8080/).

### Configuração

- Fazer configuração inicial do Wordpress (se necessário)
- Fazer login acessando [/wp-admin](http://localhost:8080/wp-admin/)
- Definir o tema para `sejameuc`
- Configurar [WP-SCSS](#wp-scss) para usar pastas no tema
