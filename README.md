# Uma Api para um repositorio de todos os autores e seus livros

## Para acessar a documentação vá em http://127.0.0.1:8000/api/documentation#/

### A Rota de get do Autor permite que passemos os atributos do livro como parametros exemplo : http://127.0.0.1:8000/api/v1/Autor?atributos_livro=autor_id,titulo A resposta será por exemplo : {
        "id": 2,
        "created_at": "2023-09-09T15:58:14.000000Z",
        "updated_at": "2023-09-09T15:58:14.000000Z",
        "nome": "Deyllof3n",
        "livros": [
            {
                "autor_id": 2,
                "titulo": "O terror em Jf"
            },
            {
                "autor_id": 2,
                "titulo": "joao e o pé de maconha"
            }
        ]
    },

#### Esse projeto foi feito para aprender a usar php e laravel 
