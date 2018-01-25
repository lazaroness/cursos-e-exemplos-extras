-- join produto com fabricante familia e unidade de medida
-- exibir na tela o codigo do produto, sua descricao e a descricao do
-- fabricante, familia e unidade de medida
SELECT
produto.codigo,
produto.descricao                as produto,
produto_fabricante.descricao     as fabricante,
produto_familia.descricao        as familia, 
produto_unidade_medida.descricao as unidade_medida
FROM produto
LEFT JOIN produto_fabricante ON produto.fabricante_id = produto_fabricante.id
LEFT JOIN produto_familia    ON produto.familia_id    = produto_familia.id
LEFT JOIN produto_unidade_medida ON produto.unidade_medida_id = produto_unidade_medida.id
ORDER BY produto.id, produto.descricao
LIMIT 20;