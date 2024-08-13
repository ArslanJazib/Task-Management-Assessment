# Assessment Project

## Overview

This project is a web application for managing projects and tasks. It includes features for CRUD operations on projects and tasks, as well as task reordering functionality. The application uses Laravel as the backend framework and DataTables for advanced table functionalities.

## Table of Contents

- [Dependencies](#dependencies)
- [Libraries Used](#libraries-used)
- [Request Classes](#request-classes)
- [Factories for Testing](#factories-for-testing)
- [Installation](#installation)
- [Usage](#usage)

## Dependencies

This project depends on the following packages and tools:

- **Laravel**: The PHP framework used for building the web application.
- **Yajra DataTables**: Provides server-side processing for DataTables.
- **Bootstrap**: For styling and responsive design.
- **jQuery**: Required for Bootstrap and DataTables functionality.
- **jQuery UI**: Used for the sortable functionality in the tasks table.

## Libraries Used

- **Laravel**: A PHP framework for web development.
- **Yajra/DataTables**: For handling DataTables server-side processing. [Documentation](https://yajrabox.com/docs/laravel-datatables/master)
- **Bootstrap**: A CSS framework for responsive design. [Documentation](https://getbootstrap.com/)
- **jQuery**: A JavaScript library for easier DOM manipulation and AJAX requests. [Documentation](https://jquery.com/)
- **jQuery UI**: A set of widgets, effects, and themes built on top of jQuery. [Documentation](https://jqueryui.com/)

## Request Classes

The application uses the following request classes for form validation:

- **StoreProjectRequest**: Handles validation for creating a new project.
- **UpdateProjectRequest**: Handles validation for updating an existing project.
- **StoreTaskRequest**: Handles validation for creating a new task.
- **UpdateTaskRequest**: Handles validation for updating an existing task.

## Factories for Testing

Factories are used to generate dummy data for testing:

- **ProjectFactory**: Generates test data for the `Project` model.
- **TaskFactory**: Generates test data for the `Task` model.

Factories are defined in the `database/factories` directory. To use these factories for testing, ensure that you have the `phpunit` package installed and configured.

## Installation

To set up the project on your local machine, follow these steps:

1. **Clone the repository:**

   ```bash
   git clone https://github.com/ArslanJazib/Task-Management-Assessment.git