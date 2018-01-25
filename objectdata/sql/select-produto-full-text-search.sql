--EXPLAIN ANALYZE
SELECT produto.descricao
FROM produto
WHERE
--COMPAT_LIKE(descricao) LIKE COMPAT_LIKE('%pl%mae%')
descricao_vector @@ 'pl&mae'