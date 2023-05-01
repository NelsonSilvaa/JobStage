
SELECT * from usuario as U
inner join usuario_formacao as UF
on U.ID_USUARIO = UF.ID_USUARIO
INNER JOIN FORMACAO AS F
ON F.ID_FORMACAO = UF.ID_FORMACAO
INNER JOIN USUARIO_EXPERIENCIA AS UE
ON UE.ID_USUARIO = U.ID_USUARIO
INNER JOIN EXPERIENCIA AS E
ON E.ID_EXPERIENCIA = UE.ID_EXPERIENCIA
INNER JOIN USUARIO_ESCOLARIDADE AS UES
ON UES.ID_USUARIO = U.ID_USUARIO
INNER JOIN ESCOLARIDADE AS ES
ON ES.ID_ESCOLARIDADE = UES.ID_ESCOLARIDADE
INNER JOIN USUARIO_CURSO_EXTRA AS UCX
ON UCX.ID_USUARIO = U.ID_USUARIO
INNER JOIN CURSO_EXTRA AS CX
ON CX.ID_CURSO = UCX.ID_CURSO_EXTRA
