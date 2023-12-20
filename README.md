# Helpdesk Ticketing System

## Overview
![Ticket-Manager](https://github.com/Youcode-Classe-E-2023-2024/Benfillous-Anass_tickets_manager/assets/109225791/cf059366-d486-469d-a19d-98c8f02c9377)

This project involves the creation of a Helpdesk Ticketing System using native PHP with an object-oriented programming (OOP) approach. The system is designed to facilitate internal communication among developers at Avito by providing a centralized platform for managing development needs, bug reports, and other related tasks.

## Frameworks

The project leverages fundamental soft skills in a professional environment, emphasizing the importance of effective communication, collaboration, and problem-solving.

## Course Information

This project is part of the [2023] Web and Mobile Web Developer course, focusing on practical application and skill development in web development.

## Project Context

Avito has initiated the development of a ticket management system to streamline internal workflows among developers. The system aims to enable developers to quickly understand and address the company's development needs, bug fixes, and other related tasks.

## Key Features

The Helpdesk Ticketing System includes the following features:

- **Object-Oriented Programming (OOP):** Utilizing PHP's native OOP capabilities for efficient and organized code structure.
- **Authentication:** Implementing user authentication functionalities such as login, logout, and registration.
- **Ticket Creation:** Allowing users to create tickets to document development needs, bug reports, etc.
- **Ticket Assignment:** Enabling the assignment of tickets to specific developers.
- **Ticket Tagging:** Providing the ability to add tags to tickets for better categorization.
- **Ticket Status:** Tracking and updating the status of tickets.
- **Ticket Prioritization:** Assigning priority levels to tickets.
- **Ticket Filtering:** Implementing filters to view all tickets, those created by the user, and those assigned to the user.
- **Many-to-Many Relationship:** Establishing a many-to-many relationship between users and tickets.
- **Ticket Details Page:** Creating a detailed view of each ticket with a space for comments.
- **AJAX Communication:** Implementing asynchronous communication for a seamless user experience.

## Bonus Features

In addition to the core functionalities, the project includes bonus features:

- **AJAX Communication:** Enhancing the user interface with asynchronous communication.
- **Security Measures:** Implementing security measures to protect the site against SQL injections, XSS vulnerabilities, and DDoS attacks.

## Project Structure

The project is organized into the following directories and files:

- **img:** Contains images used in the project.
- **pages:** Houses different pages of the system.
- **script:** Includes scripts used in the project.
- **style:** Contains CSS stylesheets.
- **app:** Main application directory.
    - **config:** Configuration files.
    - **controllers:** Controllers handling different aspects of the application.
    - **helper:** Helper functions for various tasks.
    - **libraries:** Additional libraries used in the project.
    - **models:** Models representing database entities.
- **bootstrap.php:** Bootstrap file for initializing the application.
- **diagrams:** Diagrams illustrating the project structure.
- **.gitignore:** File specifying files and directories to be ignored by version control.
- **ticket.sql:** SQL file for database schema and initial data.

## Getting Started

To set up the Helpdesk Ticketing System, follow these steps:

1. Configure the database by importing the `ticket.sql` file.
2. Adjust configuration settings in the `config` directory.
3. Ensure that your server supports PHP and has the necessary extensions.
4. Access the system through the `index.php` file.

## Contributors

- Benfillous Anass

## License

This project is licensed under the [License Name] - see the [LICENSE.md](LICENSE.md) file for details.
