SELECT
produto_serie.descricao,
produto.id,
produto.descricao
FROM produto
LEFT JOIN produto_serie ON produto.serie_id = produto_serie.id
WHERE produto_serie.descricao = 'CR25'
ORDER BY produto_serie.descricao, produto.descricao;