// Importe os módulos necessários
const express = require('express');
const { createConnection } = require('mysql');
const { json } = require('body-parser');

const app = express();
const port = 3000;

// Configuração do banco de dados
const db = createConnection({
    host: 'localhost',
    user: 'root',
    password: 'root123',
    database: 'cadastroaluno'
});

// Conectar ao banco de dados
db.connect((err) => {
    if (err) {
        console.error('Erro ao conectar ao banco de dados:', err);
        return;
    }
    console.log('Conectado ao banco de dados MySQL');
});

// Middleware para analisar o corpo das solicitações
app.use(json());

// Configuração da rota para armazenar a nova data no banco de dados
app.post('/api/alterarBotao', (req, res) => {
    const novaData2 = req.body.novaData2;

    // Executar a query para armazenar a nova data no banco de dados
    const sql = 'INSERT INTO info_botao (nova_data) VALUES (?)';
    db.query(sql, [novaData2], (err, result) => {
        if (err) {
            console.error('Erro ao inserir a nova data:', err);
            res.status(500).send('Erro interno do servidor');
            return;
        }

        res.status(200).send('Nova data inserida com sucesso');
    });
});

// Configuração da rota para obter a nova data do banco de dados
app.get('/api/obterBotao', (req, res) => {
    // Executar a query para obter a última nova data do banco de dados
    const sql = 'SELECT nova_data FROM info_botao ORDER BY id DESC LIMIT 1';
    db.query(sql, (err, result) => {
        if (err) {
            console.error('Erro ao obter a nova data:', err);
            res.status(500).send('Erro interno do servidor');
            return;
        }

        const novaDataArmazenada2 = result[0] ? result[0].nova_data : null;
        res.status(200).json({ novaData2: novaDataArmazenada2 });
    });
});

// Iniciar o servidor
app.listen(port, () => {
    console.log(`Servidor ouvindo na porta ${port}`);
});
