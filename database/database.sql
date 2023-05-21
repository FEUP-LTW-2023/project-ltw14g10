PRAGMA foreign_keys = ON;

DROP TABLE IF EXISTS TICKET_HASHTAG;
DROP TABLE IF EXISTS FAQ;
DROP TABLE IF EXISTS HASHTAG;
DROP TABLE IF EXISTS MESSAGE;
DROP TABLE IF EXISTS TICKET;
DROP TABLE IF EXISTS ADMIN;
DROP TABLE IF EXISTS AGENT;
DROP TABLE IF EXISTS CLIENT;
DROP TABLE IF EXISTS SUBJECT;
DROP TABLE IF EXISTS USER;
DROP TABLE IF EXISTS STATUS;

CREATE TABLE SUBJECT (
    ID INTEGER PRIMARY KEY,
    CODE TEXT NOT NULL UNIQUE,
    SUBJECT_NAME TEXT NOT NULL UNIQUE,
    FULL_NAME TEXT NOT NULL UNIQUE,
    YEAR INTEGER NOT NULL
);

CREATE TABLE USER (
    ID INTEGER PRIMARY KEY,
    USERNAME TEXT NOT NULL UNIQUE,
    [PASSWORD] TEXT NOT NULL,
    EMAIL TEXT NOT NULL,
    [NAME] TEXT NOT NULL
);

CREATE TABLE CLIENT (
    USER_ID INTEGER PRIMARY KEY,
    FOREIGN KEY (USER_ID) REFERENCES USER(ID) ON DELETE CASCADE
);

CREATE TABLE AGENT (
    USER_ID INTEGER PRIMARY KEY,
    SUBJECT_ID INTEGER,
    FOREIGN KEY (USER_ID) REFERENCES USER(ID) ON DELETE CASCADE,
    FOREIGN KEY (SUBJECT_ID) REFERENCES SUBJECT(ID)
);

CREATE TABLE ADMIN (
    USER_ID INTEGER PRIMARY KEY,
    FOREIGN KEY (USER_ID) REFERENCES USER(ID) ON DELETE CASCADE
);

CREATE TABLE TICKET (
    ID INTEGER PRIMARY KEY,
    CLIENT_ID INTEGER NOT NULL,
    AGENT_ID INTEGER,
    SUBJECT_ID INTEGER NOT NULL,
    STATUS_ID INTEGER NOT NULL,
    TITLE TEXT NOT NULL,
    DESCRIPTION TEXT NOT NULL,
    CREATED_AT TEXT NOT NULL,
    FOREIGN KEY (CLIENT_ID) REFERENCES CLIENT(USER_ID) ON DELETE CASCADE,
    FOREIGN KEY (AGENT_ID) REFERENCES AGENT(USER_ID) ON DELETE SET NULL,
    FOREIGN KEY (SUBJECT_ID) REFERENCES SUBJECT(ID) ON DELETE CASCADE,
    FOREIGN KEY (STATUS_ID) REFERENCES STATUS(ID)
);

CREATE TABLE STATUS (
    ID INTEGER PRIMARY KEY,
    STATUS_TEXT TEXT NOT NULL
);

CREATE TABLE HASHTAG (
    ID INTEGER PRIMARY KEY,
    TAG TEXT
);

CREATE TABLE TICKET_HASHTAG (
    TICKET_ID INTEGER NOT NULL,
    TAG INTEGER NOT NULL,
    FOREIGN KEY (TICKET_ID) REFERENCES TICKET(ID),
    FOREIGN KEY (TAG) REFERENCES HASHTAG(ID)
);

CREATE TABLE FAQ (
    ID INTEGER PRIMARY KEY,
    QUESTION TEXT NOT NULL,
    ANSWER TEXT NOT NULL,
    SUBJECT_ID INTEGER NOT NULL,
    CREATED_AT TEXT,
    UPDATED_AT TEXT,
    FOREIGN KEY (SUBJECT_ID) REFERENCES SUBJECT(ID) ON DELETE CASCADE
);

CREATE TABLE MESSAGE (
    ID INTEGER PRIMARY KEY,
    TICKET_ID INTEGER NOT NULL,
    SENDER_ID INTEGER NOT NULL,
    RECEIVER_ID INTEGER NOT NULL,
    MESSAGE_TEXT TEXT NOT NULL,
    CREATED_AT TEXT,
    FOREIGN KEY (TICKET_ID) REFERENCES TICKET(ID) ON DELETE CASCADE,
    FOREIGN KEY (SENDER_ID) REFERENCES USER(ID) ON DELETE CASCADE,
    FOREIGN KEY (RECEIVER_ID) REFERENCES USER(ID) ON DELETE CASCADE
);

CREATE TRIGGER deleted_status
AFTER DELETE ON STATUS
BEGIN
  UPDATE TICKET
  SET STATUS_ID = 1
  WHERE STATUS_ID = OLD.ID;
END;

INSERT INTO USER(ID, USERNAME, [PASSWORD], EMAIL, [NAME]) VALUES
  (1, 'francis802', '$2y$10$qMxaoIwyjY.Q/S7fqvF/t.140up4lEtwRFuhIEyn2pwcuF3p8sE76', 'franciscosccampos@gmail.com', 'Francisco Campos'),
  (2, 'jotas', '$2y$10$fmLMEGlhzwOsR31aWKrizOjwMPvWwRp5w/5K06ekIz0b4Uyuz4N6u', 'j@g.com', 'João Miguel');

INSERT INTO SUBJECT (ID, CODE, SUBJECT_NAME, FULL_NAME, [YEAR]) VALUES
  -- 1st year
  (1, 'L.EIC001', 'ALGA', 'Álgebra Linear e Geometria Analítica', 1),
  (2, 'L.EIC002', 'AM I', 'Análise Matemática I', 1),
  (3, 'L.EIC003', 'FSC', 'Fundamentos de Sistemas Computacionais', 1),
  (4, 'L.EIC004', 'MD', 'Matemática Discreta', 1),
  (5, 'L.EIC005', 'FP', 'Fundamentos da Programação', 1),
  (6, 'L.EIC006', 'AC', 'Arquitetura de Computadores', 1),
  (7, 'L.EIC007', 'AM II', 'Análise Matemática II', 1),
  (8, 'L.EIC008', 'F I', 'Física I', 1),
  (9, 'L.EIC009', 'P', 'Programação', 1),
  (10, 'L.EIC010', 'TC', 'Teoria da Computação', 1),

  -- 2nd year
  (11, 'L.EIC011', 'AED', 'Algoritmos e Estruturas de Dados', 2),
  (12, 'L.EIC012', 'BD', 'Bases de Dados', 2),
  (13, 'L.EIC013', 'F II', 'Física II', 2),
  (14, 'L.EIC014', 'LDTS', 'Laboratório de Desenho e Teste de Software', 2),
  (15, 'L.EIC015', 'SO', 'Sistemas Operativos', 2),
  (16, 'L.EIC016', 'DA', 'Desenho de Algoritmos', 2),
  (17, 'L.EIC017', 'ES', 'Engenharia de Software', 2),
  (18, 'L.EIC018', 'LC', 'Laboratório de Computadores', 2),
  (19, 'L.EIC019', 'LTW', 'Linguagens e Tecnologias Web', 2),
  (20, 'L.EIC020', 'ME', 'Métodos Estatísticos', 2),

  -- 3rd year
  (21, 'L.EIC021', 'FSI', 'Fundamentos de Segurança Informática', 3),
  (22, 'L.EIC022', 'IPC', 'Interação Pessoa Computador', 3),
  (23, 'L.EIC023', 'LBAW', 'Laboratório de Bases de Dados e Aplicações Web', 3),
  (24, 'L.EIC024', 'PFL', 'Programação Funcional e em Lógica', 3),
  (25, 'L.EIC025', 'RC', 'Redes de Computadores', 3),
  (26, 'L.EIC026', 'C', 'Compiladores', 3),
  (27, 'L.EIC027', 'CG', 'Computação Gráfica', 3),
  (28, 'L.EIC028', 'CPD', 'Computação Paralela e Distribuída', 3),
  (29, 'L.EIC029', 'IA', 'Inteligência Artificial', 3),
  (30, 'L.EIC030', 'PI', 'Projeto Integrador', 3);

INSERT INTO CLIENT(USER_ID) VALUES (1), (2);

INSERT INTO AGENT(USER_ID, SUBJECT_ID) VALUES (1,1), (2,2);

INSERT INTO ADMIN(USER_ID) VALUES (1), (2);

INSERT INTO STATUS (ID, STATUS_TEXT) VALUES (1, 'Unknown'), (2, 'To Be Assigned'), (3, 'Open'), (4, 'In Progress'), (5, 'Closed');

INSERT INTO TICKET(ID, CLIENT_ID, AGENT_ID, SUBJECT_ID, STATUS_ID, TITLE, DESCRIPTION, CREATED_AT) VALUES (1, 1, 2, 1, 3, 'Account Issues', 'I''m experiencing issues with my account.', '2023-05-21 09:00:00');

INSERT INTO MESSAGE (ID, TICKET_ID, SENDER_ID, RECEIVER_ID, MESSAGE_TEXT, CREATED_AT) VALUES
  (1, 1, 2, 1, 'Hello, how can I help you?', '2023-05-21 09:00:00'),
  (2, 1, 1, 2, 'Hi, I''m here to assist you.', '2023-05-21 09:01:00'),
  (3, 1, 2, 1, 'I''m experiencing issues with my account.', '2023-05-21 09:02:00'),
  (4, 1, 1, 2, 'I''ll do my best to resolve the issue. Could you provide me with your account details?', '2023-05-21 09:03:00'),
  (5, 1, 2, 1, 'Sure, my account username is "exampleuser".', '2023-05-21 09:04:00');