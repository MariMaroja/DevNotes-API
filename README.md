DevNotes API

A simple REST API built with PHP for managing developer notes. This project demonstrates CRUD operations, JSON handling, HTTP status codes, and a basic MVC-inspired structure without using any frameworks.

Features
Create notes
List all notes
Get a note by ID
Update existing notes
Delete notes
JSON-based storage
Standardized HTTP responses
Technologies
PHP 8+
JSON File Storage
REST API Principles
Project Structure
DevNotesAPI/
│
├── index.php
│
├── controllers/
│
├── models/
│   └── Note.php
│
├── data/
│   └── notes.json
│
└── utils/
    └── Response.php
API Endpoints
Get All Notes
GET /

Response:

[
  {
    "id": 1,
    "title": "Spring Boot",
    "content": "Dependency Injection"
  }
]
Get Note By ID
GET /?id=1

Response:

{
  "id": 1,
  "title": "Spring Boot",
  "content": "Dependency Injection"
}
Create Note
POST /

Request Body:

{
  "title": "FastAPI",
  "content": "Python framework"
}

Response:

{
  "id": 1,
  "title": "FastAPI",
  "content": "Python framework"
}

Status:

201 Created
Update Note
PUT /?id=1

Request Body:

{
  "title": "Spring Boot",
  "content": "REST APIs and Dependency Injection"
}

Response:

{
  "id": 1,
  "title": "Spring Boot",
  "content": "REST APIs and Dependency Injection"
}
Delete Note
DELETE /?id=1

Response:

{
  "message": "Note deleted successfully"
}
Running the Project

Start the PHP development server:

php -S localhost:8000

Open:

http://localhost:8000
Learning Objectives

This project was built to practice:

REST API development
HTTP methods (GET, POST, PUT, DELETE)
JSON serialization/deserialization
Request validation
File persistence
Basic project organization
HTTP status codes
Future Improvements
MySQL integration
Routing system
Controllers layer
Request validation classes
Authentication with JWT
Docker support
Unit tests
Author

Developed as part of a backend portfolio and learning journey focused on PHP and REST API development.
