<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabela dos Programadores</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
</head>
<style>
    html {
        scroll-behavior: smooth;
    }

    body {
        font-family: "DM Sans";
        font-size: 0.92rem;

        text-align: center;
        overflow: overlay;
        justify-content: center;

        --button-1: hsl(180, 60%, 45%);
        --button-2: hsl(57, 88%, 48%);
        --button-3: hsl(0, 87%, 46%);
    }

    table {
        width: 100%;
        border-collapse: collapse;
    }

    table,
    th,
    td {
        padding: 10px;
        border: 1px solid black;
    }

    th,
    td {
        text-align: center;
    }

    img {
        max-width: 150px;
        max-height: 150px;
    }

    button {
        padding: 1rem;
        font-size: 1rem;
        border: none;
        background-color: var(--button-1);
        color: white;
        border-radius: 0.4rem;
        cursor: pointer;
    }

    .header {
        display: flex;
        flex-wrap: wrap;
        justify-content: flex-start;
        width: 95%;
        margin: 1rem;
    }

    .edit {
        background-color: var(--button-2);
    }

    .delete {
        background-color: var(--button-3);
    }
</style>

<body>

    <form action="" method="post">
        <div class="header">
            <button type="submit" formaction="/new_programmer.php">
                <i class="fa fa-plus" aria-hidden="true"></i>
                Novo
            </button>
        </div>
        <table>
            <thead>
                <tr>
                    <th>Imagem</th>
                    <th>Nome</th>
                    <th>CPF</th>
                    <th>E-mail</th>
                    <th>Gênero</th>
                    <th>Telefone</th>
                    <th>Idade</th>
                    <th>Linguagens</th>
                    <th>CEP</th>
                    <th>Número</th>
                    <th>Logradouro</th>
                    <th>Bairro</th>
                    <th>UF</th>
                    <th>Cidade</th>
                    <th>Complemento</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                require 'conn.php';
                $query = $conn->prepare("SELECT * FROM `Programador`");
                $query->execute();
                while ($fetch = $query->fetch()) {
                ?>
                    <tr>
                        <td>
                            <?php if ($fetch['imagem']) : ?>
                                <img src="data:imagem/png;base64,<?php echo base64_encode($fetch['imagem']); ?> ">
                            <?php else :
                                echo 'Nenhuma imagem salva.'
                            ?>
                            <?php endif; ?>
                        </td>
                        <td><?php echo $fetch['nome'] ?></td>
                        <td><?php echo $fetch['cpf'] ?></td>
                        <td><?php echo $fetch['email'] ?></td>
                        <td><?php echo $fetch['genero'] ?></td>
                        <td><?php echo $fetch['telefone'] ?></td>
                        <td><?php echo calculateIdade($fetch['dataNascimento']) ?></td>
                        <td><?php echo $fetch['linguagens'] ?></td>
                        <td><?php echo $fetch['cep'] ?></td>
                        <td><?php echo $fetch['numero'] ?></td>
                        <td><?php echo $fetch['logradouro'] ?></td>
                        <td><?php echo $fetch['bairro'] ?></td>
                        <td><?php echo $fetch['uf'] ?></td>
                        <td><?php echo $fetch['cidade'] ?></td>
                        <td><?php echo $fetch['complemento'] ?></td>
                        <td>
                            <div class="header">
                                <button type="submit" class="edit" formaction="update.php?id=<?php echo $fetch['id'] ?>">
                                    <i class="fa fa-pen" aria-hidden="true"></i>
                                    Editar
                                </button>
                            </div>
                            <div class="header">
                                <button type="submit" class="delete" formaction="delete.php?id=<?php echo $fetch['id'] ?>" onclick="alert('Registro excluído com sucesso')">
                                    <i class="fa fa-trash" aria-hidden="true"></i>
                                    Deletar
                                </button>
                            </div>

                        </td>
                    </tr>
                <?php
                }
                function calculateIdade($dataNascimentoo)
                {
                    $dataNascimento = new DateTime($dataNascimentoo);
                    $hoje = new DateTime('today');
                    $idade = $dataNascimento->diff($hoje)->y;
                    return $idade;
                }

                ?>
            </tbody>
        </table>
    </form>
</body>

</html>