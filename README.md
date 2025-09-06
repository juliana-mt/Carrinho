<h1>Carrinho de Compras</h1>

Juliana Moreno Torres - 1994729<br>
Maria Fernanda De Andrade - 1998066
<h2>Intruções de execução</h2>
  1 instalar XAMPP<br>
  2 Copiar a pasta do protejo para "htdocs"<br>
  3 Acessar no navegador: http://localhos/carrinho/index.php<br>
<br>
<h4>Estrutura das pastas</h4>
Carrinho/<br>
---index.php<br>
---README.pdf<br>
---src/<br>
-------shoppingCart.php<br>
<br>
<strong>Funcionalidades Implementadas</strong><br>
• Adicionar item ao carrinho (valida se produto existe e tem estoque)
• Remover item do carrinho (estoque restaurado)
• Listar itens no carrinho (quantidade, subtotal e total)
• Calcular total do carrinho
• Aplicar desconto fixo (cupom DESCONTO10 → 10%)<br>
<strong>Casos de Uso (Exemplos de Teste)</strong><br>
1 Caso 1 — Usuário adiciona um produto válido Entrada: id=1, quantidade=2 Resultado: Produto
adicionado, estoque atualizado.<br>
2 Caso 2 — Usuário tenta adicionar além do estoque Entrada: id=3, quantidade=10 Resultado:
Mensagem de erro 'Estoque insuficiente'.<br>
3 Caso 3 — Usuário remove produto do carrinho Entrada: id=2 Resultado: Produto removido,
estoque restaurado.<br>
4 Caso 4 — Aplicação de cupom de desconto Entrada: cupom=DESCONTO10 Resultado: Valor
total reduzido em 10%.<br>
<br>
<strong>Limitações</strong><br>
• O projeto não utiliza banco de dados (apenas arrays fixos).<br>
• Não há interface de login ou usuário.<br>
• Os inputs podem estar fixos em arrays/variáveis.<br>
• Não são usados frameworks externos (apenas PHP puro no XAMPP).<br>
