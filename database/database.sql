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
  (2, 'jotas', '$2y$10$fmLMEGlhzwOsR31aWKrizOjwMPvWwRp5w/5K06ekIz0b4Uyuz4N6u', 'j@g.com', 'João Miguel'),
  (3, 'maria89', '$2y$10$fmLMEGlhzwOsR31aWKrizOjwMPvWwRp5w/5K06ekIz0b4Uyuz4N6u', 'maria89@example.com', 'Maria Silva'),
  (4, 'pedro123', '$2y$10$fmLMEGlhzwOsR31aWKrizOjwMPvWwRp5w/5K06ekIz0b4Uyuz4N6u', 'pedro123@example.com', 'Pedro Sousa'),
  (5, 'ana22', '$2y$10$fmLMEGlhzwOsR31aWKrizOjwMPvWwRp5w/5K06ekIz0b4Uyuz4N6u', 'ana22@example.com', 'Ana Ferreira'),
  (6, 'carlos78', '$2y$10$fmLMEGlhzwOsR31aWKrizOjwMPvWwRp5w/5K06ekIz0b4Uyuz4N6u', 'carlos78@example.com', 'Carlos Santos'),
  (7, 'andre56', '$2y$10$fmLMEGlhzwOsR31aWKrizOjwMPvWwRp5w/5K06ekIz0b4Uyuz4N6u', 'andre56@example.com', 'André Costa'),
  (8, 'sara12', '$2y$10$fmLMEGlhzwOsR31aWKrizOjwMPvWwRp5w/5K06ekIz0b4Uyuz4N6u', 'sara12@example.com', 'Sara Oliveira'),
  (9, 'ricardo93', '$2y$10$fmLMEGlhzwOsR31aWKrizOjwMPvWwRp5w/5K06ekIz0b4Uyuz4N6u', 'ricardo93@example.com', 'Ricardo Santos'),
  (10, 'diana45', '$2y$10$fmLMEGlhzwOsR31aWKrizOjwMPvWwRp5w/5K06ekIz0b4Uyuz4N6u', 'diana45@example.com', 'Diana Almeida'),
  (11, 'manuel67', '$2y$10$fmLMEGlhzwOsR31aWKrizOjwMPvWwRp5w/5K06ekIz0b4Uyuz4N6u', 'manuel67@example.com', 'Manuel Castro'),
  (12, 'rita29', '$2y$10$fmLMEGlhzwOsR31aWKrizOjwMPvWwRp5w/5K06ekIz0b4Uyuz4N6u', 'rita29@example.com', 'Rita Santos'),
  (13, 'tiago83', '$2y$10$fmLMEGlhzwOsR31aWKrizOjwMPvWwRp5w/5K06ekIz0b4Uyuz4N6u', 'tiago83@example.com', 'Tiago Pereira'),
  (14, 'sofia18', '$2y$10$fmLMEGlhzwOsR31aWKrizOjwMPvWwRp5w/5K06ekIz0b4Uyuz4N6u', 'sofia18@example.com', 'Sofia Ferreira'),
  (15, 'hugo91', '$2y$10$fmLMEGlhzwOsR31aWKrizOjwMPvWwRp5w/5K06ekIz0b4Uyuz4N6u', 'hugo91@example.com', 'Hugo Gomes'),
  (16, 'mariana76', '$2y$10$fmLMEGlhzwOsR31aWKrizOjwMPvWwRp5w/5K06ekIz0b4Uyuz4N6u', 'mariana76@example.com', 'Mariana Ribeiro'),
  (17, 'luis50', '$2y$10$fmLMEGlhzwOsR31aWKrizOjwMPvWwRp5w/5K06ekIz0b4Uyuz4N6u', 'luis50@example.com', 'Luís Martins'),
  (18, 'ines34', '$2y$10$fmLMEGlhzwOsR31aWKrizOjwMPvWwRp5w/5K06ekIz0b4Uyuz4N6u', 'ines34@example.com', 'Inês Oliveira'),
  (19, 'joaquim65', '$2y$10$fmLMEGlhzwOsR31aWKrizOjwMPvWwRp5w/5K06ekIz0b4Uyuz4N6u', 'joaquim65@example.com', 'Joaquim Rodrigues'),
  (20, 'helena42', '$2y$10$fmLMEGlhzwOsR31aWKrizOjwMPvWwRp5w/5K06ekIz0b4Uyuz4N6u', 'helena42@example.com', 'Helena Pereira');

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

-- CLIENT
INSERT INTO CLIENT(USER_ID) VALUES (1), (2), (3), (4), (5), (6), (7), (8), (9), (10), (11), (12), (13), (14), (15), (16), (17), (18), (19), (20);

-- AGENT
INSERT INTO AGENT(USER_ID, SUBJECT_ID) VALUES (1, 1), (2, 2), (3, 3), (4, 4), (5, 5), (6, 6), (7, 7), (8, 8), (9, 9), (10, 10);

-- ADMIN
INSERT INTO ADMIN(USER_ID) VALUES (1), (2), (3), (4), (5);

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

INSERT INTO TICKET(ID, CLIENT_ID, AGENT_ID, SUBJECT_ID, STATUS_ID, TITLE, DESCRIPTION, CREATED_AT) VALUES
  (1, 1, 2, 2, 1, 'integrais', 'não tou a conseguir resolver nenhum integral de substituição', '2023-05-21 10:00:00'),
  (2, 2, 3, 3, 1, 'Ajuda com Soma Binária', 'Não entendo o conceito do e vai um!', '2023-05-21 11:15:00'),
  (3, 3, NULL, 3, 2, 'FUNDAMENTOS', 'NAO SEI PYTHON', '2023-05-21 12:30:00'),
  (4, 4, 4, 4, 1, 'tarski world', 'não consigo instalar o tarski world', '2023-05-21 13:45:00'),
  (5, 5, NULL, 5, 2, 'spyder', 'nao sei fazer debug, em python é confuso', '2023-05-21 15:00:00'),
  (6, 6, 5, 5, 3, 'for loop', 'O que faz o for loop se meter a correr infinito', '2023-05-21 16:15:00'),
  (7, 7, 6, 6, 1, 'Processador', 'o processador desenhado é confuso', '2023-05-21 17:30:00'),
  (8, 8, NULL, 8, 2, 'Leis de Newton', 'Quantas são?', '2023-05-21 18:45:00'),
  (9, 9, 7, 7, 1, 'Calculadora', 'Pode-se levar a calculadora gráfica????', '2023-05-21 20:00:00'),
  (10, 10, 9, 9, 2, 'C++', 'quero voltar ao python ajuda', '2023-05-21 21:15:00'),
  (11, 11, 8, 8, 4, 'Ticket 11', 'Description of Ticket 11', '2023-05-21 22:30:00'),
  (12, 12, NULL, 12, 1, 'Ticket 12', 'Description of Ticket 12', '2023-05-21 23:45:00'),
  (13, 13, 9, 9, 1, 'Ticket 13', 'Description of Ticket 13', '2023-05-22 00:15:00'),
  (14, 14, NULL, 14, 2, 'Ticket 14', 'Description of Ticket 14', '2023-05-22 01:30:00'),
  (15, 15, 10, 10, 1, 'Ticket 15', 'Description of Ticket 15', '2023-05-22 02:45:00'),
  (16, 16, 8, 8, 1, 'Ticket 16', 'Description of Ticket 16', '2023-05-22 04:00:00'),
  (17, 17, NULL, 17, 2, 'Ticket 17', 'Description of Ticket 17', '2023-05-22 05:15:00'),
  (18, 18, 5, 5, 1, 'Ticket 18', 'Description of Ticket 18', '2023-05-22 06:30:00'),
  (19, 19, 9, 9, 4, 'Ticket 19', 'Description of Ticket 19', '2023-05-22 07:45:00'),
  (20, 20, 6, 6, 3, 'Ticket 20', 'Description of Ticket 20', '2023-05-22 09:00:00');

-- Insert hashtags into the HASHTAG table
INSERT INTO HASHTAG(ID, TAG) VALUES
  (1, 'urgent'),
  (2, 'technical'),
  (3, 'payment'),
  (4, 'account'),
  (5, 'bug');

-- Assign hashtags to tickets in the TICKET_HASHTAG table
INSERT INTO TICKET_HASHTAG(TICKET_ID, TAG) VALUES
  (1, 1),
  (1, 2),
  (2, 3),
  (3, 1),
  (4, 2),
  (5, 3),
  (6, 4),
  (7, 1),
  (8, 5),
  (9, 2),
  (10, 1);


CREATE TRIGGER deleted_status
AFTER DELETE ON STATUS
BEGIN
  UPDATE TICKET
  SET STATUS_ID = 1
  WHERE STATUS_ID = OLD.ID;
END;