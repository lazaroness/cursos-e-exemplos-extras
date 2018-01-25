SELECT
produto_serie.descricao,
produto.id,
produto.descricao
FROM produto
LEFT JOIN produto_serie ON produto.serie_id = produto_serie.id
ORDER BY produto_serie.descricao, produto.descricao;