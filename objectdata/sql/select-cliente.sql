SELECT
pedido.id,
cliente.nome_extendido,
pedido.numero
FROM pedido
--INNER JOIN cliente ON pedido.cliente_id = cliente.id -- INNER JOIN é obrigatorio bater os dados
LEFT JOIN cliente ON pedido.cliente_id = cliente.id -- LEFT JOIN não é obrigatorio bater os dados os que não bater vem por ultimo
where pedido.id BETWEEN 1 AND 10
ORDER BY cliente.id;

-- serie_id