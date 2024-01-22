
# Clients CRUD

The project is a Laravel-based client management system designed for businesses or organizations that need to keep track of their clients' information. It provides a user-friendly interface for managing client records with features such as adding, editing, and deleting clients. Additionally, the system allows users to view a list of clients, sort them, and perform basic CRUD (Create, Read, Update, Delete) operations.




## Features

- Display a List of Clients: Users can view a paginated list of clients with details such as last name, first name, phone number, and date of contact.
- Create a Client: Users can add new clients to the system by providing information such as last name, first name, phone number, and date of contact.
- Edit a Client: Users have the ability to update the details of an existing client, ensuring accurate and up-to-date information.
- Delete a Client: Users can remove clients from the system, maintaining data integrity and removing obsolete records.
- Validation Rules: The system includes validation rules for input fields to ensure data integrity and accuracy.
- Sorting: Users can sort the client list based on different criteria, providing flexibility in data presentation.



## Prerequisites

Before you begin, ensure that you have Docker installed on your machine. Laravel Sail uses Docker to manage development environments efficiently.

- **[Docker](https://www.docker.com/)**: Laravel Sail relies on Docker for containerization. Make sure you have Docker installed by following the installation instructions on the [Docker website](https://www.docker.com/).
## Environment Variables

To run this project, you will need to add the following environment variables to your `.env` file:

```bash
  cp .env.example .env
```

- `APP_KEY`
- `APP_URL`

Additionally, if you are using Laravel Sail, make sure to include the following database-related variables:

```env
DB_CONNECTION=mysql
DB_HOST=mysql
DB_PORT=3306
DB_DATABASE=example_app
DB_USERNAME=sail
DB_PASSWORD=password
```


## Run Locally

Clone the project

```bash
  git clone https://github.com/etochavez/clients-crud.git
```
or
```bash
git clone git@github.com:etochavez/clients-crud.git
```

Go to the project directory

```bash
  cd clients-crud
```

To set up the project and generate the `vendor` folder, you need to run the following Docker command using Laravel Sail:

```bash
docker run --rm \
    -u "$(id -u):$(id -g)" \
    -v $(pwd):/opt \
    -w /opt \
    laravelsail/php80-composer:latest \
    composer install --ignore-platform-reqs
```

```bash
  ./vendor/bin/sail artisan key:generate
```

Start the server

```bash
  sail up
```
or
```bash
  ./vendor/bin/sail up
```

Migrate the database

```bash
  ./vendor/bin/sail artisan migrate
```

npm needs to be installed

```bash
  ./vendor/bin/sail npm install
```

```bash
  ./vendor/bin/sail npm run build
```


## Route
To access use: http:localhost/clients



## Running Tests

To run tests, run the following command

```bash
  sail test
```
or
```bash
  ./vendor/bin/sail test
```
