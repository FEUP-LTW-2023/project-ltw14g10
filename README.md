# Features:
### All users are able to (users can simultaneously be clients and agents):
- [x] Register a new account.
- [x] Login and Logout.
- [x] Edit their profile (at least name, username, password, and e-mail).

### Clients are able to:

- [x] Submit a new ticket optionally choosing a department (e.g., "Accounting").
- [x] List and track tickets they have submitted.
- [x] Reply to inquiries (e.g., the agent asks for more details) about their tickets and add more information to already submitted tickets.

### Agents are able to (they are also clients):

- [x] List tickets from their departments (e.g., "Accounting"), and filter them in different ways (e.g., by date, by assigned agent, by status, by priority, by hashtag).
- [x] Change the department of a ticket (e.g., the client chose the wrong department).
- [x] Assign a ticket to themselves or someone else.
- [x] Change the status of a ticket. Tickets can have many statuses (e.g., open, assigned, closed); some may change automatically (e.g., ticket changes to "assigned" after being assigned to an agent).
- [x] Edit ticket hashtags easily (just type hashtag to add (with autocomplete), and click to remove).
- [x] List all changes done to a ticket (e.g., status changes, assignments, edits).
- [x] Manage the FAQ and use an answer from the FAQ to answer a ticket.

### Admins should be able to (they are also agents):

- [x] Upgrade a client to an agent or an admin.
- [x] Add new departments, statuses, and other relevant entities.
- [x] Assign agents to departments.
- [x] Control the whole system.

-----------------------------

# How to run this project:

```
git clone https://github.com/FEUP-LTW-2023/project-ltw14g10.git
cd project-ltw14g10
git checkout final-delivery-v2
sqlite3 database/database.db < database/database.sql
php -S localhost:9000
```
`Note: Make sure that you have installed php and sqlite3 to execute this code`

-----------------------------

# This project was developed by:

- Francisco Silva Cunha Campos (202108735)
- João Miguel de Castro Figueiredo (202108829)
