--EXPLAIN ANALYZE
SELECT nome_extendido, COMPAT_LIKE(nome_extendido)
FROM cliente
WHERE
COMPAT_LIKE(cliente.nome_extendido) LIKE COMPAT_LIKE('JOAO%')
--cliente.nome_extendido LIKE 'JOAO%';
AND COMPAT_LIKE(cliente.nome_extendido) <> cliente.nome_extendido