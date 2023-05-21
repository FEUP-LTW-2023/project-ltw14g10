PRAGMA foreign_keys = ON;

DROP TABLE IF EXISTS TICKET_HASHTAG;
DROP TABLE IF EXISTS FAQ;
DROP TABLE IF EXISTS HASHTAG;
DROP TABLE IF EXISTS MESSAGE;
DROP TABLE IF EXISTS CHANGE;
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
    FOREIGN KEY (SUBJECT_ID) REFERENCES SUBJECT(ID) ON DELETE CASCADE
);

CREATE TABLE MESSAGE (
    ID INTEGER PRIMARY KEY,
    TICKET_ID INTEGER NOT NULL,
    SENDER_ID INTEGER NOT NULL,
    MESSAGE_TEXT TEXT NOT NULL,
    CREATED_AT TEXT,
    FOREIGN KEY (TICKET_ID) REFERENCES TICKET(ID) ON DELETE CASCADE,
    FOREIGN KEY (SENDER_ID) REFERENCES USER(ID) ON DELETE CASCADE
);

CREATE TABLE CHANGE (
    ID INTEGER PRIMARY KEY,
    TICKET_ID INTEGER NOT NULL,
    WHAT_CHANGED TEXT NOT NULL,
    TO_WHAT TEXT NOT NULL,
    CHANGED_AT TEXT,
    FOREIGN KEY (TICKET_ID) REFERENCES TICKET(ID) ON DELETE CASCADE
);


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

INSERT INTO FAQ (ID, QUESTION, ANSWER, SUBJECT_ID)
VALUES
  (1, 'What is Algebra Linear e Geometria Analítica?', 'Algebra Linear e Geometria Analítica is a mathematical discipline that studies vector spaces, linear transformations, and analytical geometry.', 1),
  (2, 'What is Análise Matemática I?', 'Análise Matemática I is a mathematical discipline that deals with limits, continuity, and differentiation of functions.', 2),
  (3, 'What is Fundamentos de Sistemas Computacionais?', 'Fundamentos de Sistemas Computacionais is a subject that introduces the fundamental concepts of computer systems, including computer organization and architecture.', 3),
  (4, 'What is Matemática Discreta?', 'Matemática Discreta is a branch of mathematics that deals with discrete structures and mathematical reasoning.', 4),
  (5, 'What are the Fundamentos da Programação?', 'Fundamentos da Programação is an introductory course that covers the basics of programming concepts and techniques.', 5),
  (6, 'What is Arquitetura de Computadores?', 'Arquitetura de Computadores is a subject that focuses on the design and organization of computer systems and architectures.', 6),
  (7, 'What is Análise Matemática II?', 'Análise Matemática II is a mathematical discipline that deals with integration, sequences, and series.', 7),
  (8, 'What is Física I?', 'Física I is a physics course that explores topics such as mechanics, thermodynamics, and waves.', 8),
  (9, 'What is Programação?', 'Programação is a subject that focuses on the design and implementation of computer programs.', 9),
  (10, 'What is Teoria da Computação?', 'Teoria da Computação is a subject that covers the fundamentals of computer science, including automata theory, computability, and complexity theory.', 10),
  (11, 'What is Algoritmos e Estruturas de Dados?', 'Algoritmos e Estruturas de Dados is a subject that covers algorithms and data structures used in computer programming.', 11),
  (12, 'What is Bases de Dados?', 'Bases de Dados is a subject that focuses on database design, implementation, and management.', 12),
  (13, 'What is Física II?', 'Física II is a physics course that explores topics such as electromagnetism, waves, and optics.', 13),
  (14, 'What is Laboratório de Desenho e Teste de Software?', 'Laboratório de Desenho e Teste de Software is a lab course where students learn to design and test software.', 14),
  (15, 'What is Sistemas Operativos?', 'Sistemas Operativos is a subject that covers the principles and techniques of operating systems.', 15),
  (16, 'What is Desenho de Algoritmos?', 'Desenho de Algoritmos is a subject that covers the design and analysis of algorithms.', 16),
  (17, 'What is Engenharia de Software?', 'Engenharia de Software is a subject that covers the principles and techniques of software engineering.', 17),
  (18, 'What is Laboratório de Computadores?', 'Laboratório de Computadores is a lab course where students learn to design and implement computer systems.', 18),
  (19, 'What is Linguagens e Tecnologias Web?', 'Linguagens e Tecnologias Web is a subject that covers the principles and techniques of web development.', 19),
  (20, 'What is Métodos Estatísticos?', 'Métodos Estatísticos is a subject that covers the principles and techniques of statistics.', 20),
  (21, 'What is Fundamentos de Segurança Informática?', 'Fundamentos de Segurança Informática is a subject that covers the principles and techniques of computer security.', 21),
  (22, 'What is Interação Pessoa Computador?', 'Interação Pessoa Computador is a subject that focuses on designing user interfaces and studying human-computer interaction.', 22),
  (23, 'What is Laboratório de Bases de Dados e Aplicações Web?', 'Laboratório de Bases de Dados e Aplicações Web is a lab course where students learn to develop database-driven web applications.', 23),
  (24, 'What is Programação Funcional e em Lógica?', 'Programação Funcional e em Lógica is a subject that covers the principles and techniques of functional and logic programming.', 24),
  (25, 'What is Redes de Computadores?', 'Redes de Computadores is a subject that covers the principles and techniques of computer networks.', 24),
  (26, 'What is Compiladores?', 'Compiladores is a subject that covers the principles and techniques of compiler design.', 25),
  (27, 'What is Computação Gráfica?', 'Computação Gráfica is a subject that covers the principles and techniques of computer graphics.', 26),
  (28, 'What is Computação Paralela e Distribuída?', 'Computação Paralela e Distribuída is a subject that covers the principles and techniques of parallel and distributed computing.', 27),
  (29, 'What is Inteligência Artificial?', 'Inteligência Artificial is a subject that covers the principles and techniques of artificial intelligence.', 28),
  (30, 'What is Projeto Integrador?', 'Projeto Integrador is a subject that focuses on the design and implementation of a software project.', 29);



CREATE TRIGGER deleted_status
AFTER DELETE ON STATUS
BEGIN
  UPDATE TICKET
  SET STATUS_ID = 1
  WHERE STATUS_ID = OLD.ID;
END;