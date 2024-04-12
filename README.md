# This Project Made By Team12
![photo_2024-03-24_03-23-35](https://github.com/itse-uot/ITSE412-fall23-r12/assets/52647886/d14926bb-1a0b-4772-802f-3b78cd3b12fe)

## getting started 🚀:
To get started with this project, follow these steps:

1. **Clone the Repository:**

<br>

   ![DownloadGIF](https://github.com/itse-uot/ITSE412-fall23-r12/assets/52647886/52fe1363-ed40-42d8-954a-155980b0480e)

<br>


   Open your terminal/command prompt and navigate to the directory where you want to clone the repository. Then, execute the following command:
```
git clone https://github.com/itse-uot/ITSE412-fall23-r12.git
```
2. **Move the Files 📁:**
After cloning the repository, move the contents of the cloned directory into your XAMPP's `htdocs` folder. This folder is typically located at:
```
{path_to_xampp}/htdocs/
```
You can do this manually or by using the command line.

3. **Start XAMPP:**
Start your XAMPP server if it's not already running. This is usually done by executing the XAMPP control panel and starting the Apache server.


<br>

![OnAndOffSwitchGIF](https://github.com/itse-uot/ITSE412-fall23-r12/assets/52647886/2461591f-7d69-4268-b4ad-a2a9608462dd)

<br>


5. **Import Database 💾:**
Open your web browser and navigate to phpMyAdmin (typically accessible at http://localhost/phpmyadmin/).
- Log in with your credentials (if required).
- Create a new database named `rppp`.
- Select the newly created database from the left sidebar.
- Click on the "Import" tab in the top menu.
- Choose the `rppp.sql` backup file provided with the project.
- Click on the "Go" button to import the database structure and data.

**⚠️ Warning ⚠️:**
root@localhost should have password of `1234` !

6. **Access the Project:**
Once the server is running, open your web browser and navigate to:


<br>

[http://localhost/ITSE412-fall23-r12/](http://localhost/ITSE412-fall23-r12) OR  http://localhost/{name_of_cloned_directory}/

<br>


Replace `{name_of_cloned_directory}` with the name of the directory where you cloned the repository.

7. **Explore the Project 🤯:**
You should now be able to access and explore the project via your web browser.

That's it! You've successfully set up the project on your local machine.

## Introduction/Overview 🔍:
### Research Papers Publishing Portal

Welcome to the Research Papers Publishing Portal project repository! This project, led and written by Mohamed Abughrara, serves as the culmination of the graduation project for two students in our Faculty of Information Technology Software Engineering Department. Additionally, a smaller version of this project was developed as an assignment for the Advanced Web Programming course (ITSE412 course code).

### Project Overview :

Our team has successfully completed the development of the Research Papers Publishing Portal, a comprehensive system designed to facilitate the management and publication of research papers. Leveraging PHP, AJAX, and frontend technologies, we have created a robust platform capable of efficiently handling various data entities, including members, users, papers, applications, and journals.

### Team Members 👥:

- **Mohamed Abughrara (Project Leader/Writer):**
  Led the project from planning to completion, overseeing task assignments and ensuring project goals were met.

- **Ali Alghanay, Ahmed Elmahjoub, Anas Almograbi, Abulqasim Tarhouni, Aymen Altajoury:**
  Undergraduate students who contributed as programmers, each responsible for specific development tasks.

### Project Tasks 🎯:

1. **Member Data Management (Ali Alghanay):**
   - Implemented CRUD operations for managing member data.
   - Developed AJAX functions for asynchronous interaction.
   - Designed a user-friendly client-side interface.

2. **User Management System (Ahmed Elmahjoub):**
   - Developed backend PHP scripts for user management.
   - Created AJAX functions for handling user actions.
   - Designed a client-side interface for user management.

3. **Paper Management (Anas Almograbi):**
   - Implemented CRUD operations for managing paper records.
   - Integrated AJAX for seamless interaction.
   - Designed an intuitive frontend interface.

4. **Application Table Operations (Aymen Altajoury):**
   - Developed backend PHP scripts for application table operations.
   - Wrote AJAX functions for asynchronous interaction.
   - Designed and implemented a user-friendly interface.

5. **Journal Management (Abulqasim Tarhouni):**
   - Developed backend PHP scripts for journal management.
   - Integrated AJAX for efficient interaction.
   - Designed and implemented a user-friendly frontend interface.

### Project Completion ✅:

We are pleased to announce the successful completion of the Research Papers Publishing Portal project. Our team's dedication and collaborative efforts have resulted in a fully functional system that meets the requirements of our graduation project. We look forward to showcasing our project's capabilities and achievements.

Stay tuned for future updates and enhancements to the Research Papers Publishing Portal!

## DataBase Schema 📊:
![rppp](https://github.com/itse-uot/ITSE412-fall23-r12/assets/52647886/cc87f054-bb81-48c0-b314-d414ccc8da80)<?xml version="1.0" encoding="UTF-8"?>
<!DOCTYPE svg
PUBLIC "-//W3C//DTD SVG 1.1//EN"
       "http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd">
<svg viewBox="41 33 1046 588" width="1005px" height="555px" xmlns="http://www.w3.org/2000/svg" version="1.1">
   <line x1="280" y1="278" x2="270" y2="278" style="stroke:#b0b;stroke-width:1;"/>
   <line x1="147" y1="338" x2="137" y2="338" style="stroke:#b0b;stroke-width:1;"/>
   <line x1="270" y1="278" x2="147" y2="338" style="stroke:#b0b;stroke-width:1;"/>
   <line x1="272.5" y1="278" x2="276.03553390593" y2="281.53553390593" style="stroke:#b0b;stroke-width:2;"/>
   <line x1="272.5" y1="278" x2="276.03553390593" y2="274.46446609407" style="stroke:#b0b;stroke-width:2;"/>
   <line x1="142" y1="338" x2="145.53553390593" y2="341.53553390593" style="stroke:#b0b;stroke-width:2;"/>
   <line x1="142" y1="338" x2="145.53553390593" y2="334.46446609407" style="stroke:#b0b;stroke-width:2;"/>
   <line x1="386" y1="298" x2="396" y2="298" style="stroke:#0bf;stroke-width:1;"/>
   <line x1="502" y1="403" x2="512" y2="403" style="stroke:#0bf;stroke-width:1;"/>
   <line x1="396" y1="298" x2="502" y2="403" style="stroke:#0bf;stroke-width:1;"/>
   <line x1="393.5" y1="298" x2="389.96446609407" y2="301.53553390593" style="stroke:#0bf;stroke-width:2;"/>
   <line x1="393.5" y1="298" x2="389.96446609407" y2="294.46446609407" style="stroke:#0bf;stroke-width:2;"/>
   <line x1="507" y1="403" x2="503.46446609407" y2="406.53553390593" style="stroke:#0bf;stroke-width:2;"/>
   <line x1="507" y1="403" x2="503.46446609407" y2="399.46446609407" style="stroke:#0bf;stroke-width:2;"/>
   <line x1="386" y1="318" x2="396" y2="318" style="stroke:#b0b;stroke-width:1;"/>
   <line x1="600" y1="192" x2="610" y2="192" style="stroke:#b0b;stroke-width:1;"/>
   <line x1="396" y1="318" x2="600" y2="192" style="stroke:#b0b;stroke-width:1;"/>
   <line x1="393.5" y1="318" x2="389.96446609407" y2="321.53553390593" style="stroke:#b0b;stroke-width:2;"/>
   <line x1="393.5" y1="318" x2="389.96446609407" y2="314.46446609407" style="stroke:#b0b;stroke-width:2;"/>
   <line x1="605" y1="192" x2="601.46446609407" y2="195.53553390593" style="stroke:#b0b;stroke-width:2;"/>
   <line x1="605" y1="192" x2="601.46446609407" y2="188.46446609407" style="stroke:#b0b;stroke-width:2;"/>
   <rect width="120" height="20" x="610" y="162" style="fill:#007;stroke:black;"/>
   <text width="120" height="20" x="615" y="176" style="fill:#fff;" font-family="Arial" font-size="16px"> applications</text>
   <rect width="120" height="20" x="610" y="182" style="fill:#aea;stroke:black;"/>
   <text width="120" height="20" x="615" y="196" style="fill:black;" font-family="Arial" font-size="16px">app_id</text>
   <rect width="120" height="20" x="610" y="202" style="fill:none;stroke:black;"/>
   <text width="120" height="20" x="615" y="216" style="fill:black;" font-family="Arial" font-size="16px">app_name</text>
   <rect width="120" height="20" x="610" y="222" style="fill:none;stroke:black;"/>
   <text width="120" height="20" x="615" y="236" style="fill:black;" font-family="Arial" font-size="16px">publish_number</text>
   <rect width="120" height="20" x="610" y="242" style="fill:none;stroke:black;"/>
   <text width="120" height="20" x="615" y="256" style="fill:black;" font-family="Arial" font-size="16px">publish_date</text>
   <rect width="98" height="20" x="237" y="433" style="fill:#007;stroke:black;"/>
   <text width="98" height="20" x="242" y="447" style="fill:#fff;" font-family="Arial" font-size="16px"> journals</text>
   <rect width="98" height="20" x="237" y="453" style="fill:#aea;stroke:black;"/>
   <text width="98" height="20" x="242" y="467" style="fill:black;" font-family="Arial" font-size="16px">j_id</text>
   <rect width="98" height="20" x="237" y="473" style="fill:none;stroke:black;"/>
   <text width="98" height="20" x="242" y="487" style="fill:black;" font-family="Arial" font-size="16px">jname</text>
   <rect width="98" height="20" x="237" y="493" style="fill:none;stroke:black;"/>
   <text width="98" height="20" x="242" y="507" style="fill:black;" font-family="Arial" font-size="16px">jphoto</text>
   <rect width="98" height="20" x="237" y="513" style="fill:none;stroke:black;"/>
   <text width="98" height="20" x="242" y="527" style="fill:black;" font-family="Arial" font-size="16px">jdesc</text>
   <rect width="98" height="20" x="237" y="533" style="fill:none;stroke:black;"/>
   <text width="98" height="20" x="242" y="547" style="fill:black;" font-family="Arial" font-size="16px">daysallowed</text>
   <rect width="98" height="20" x="237" y="553" style="fill:none;stroke:black;"/>
   <text width="98" height="20" x="242" y="567" style="fill:black;" font-family="Arial" font-size="16px">c_name</text>
   <rect width="106" height="20" x="280" y="48" style="fill:#007;stroke:black;"/>
   <text width="106" height="20" x="285" y="62" style="fill:#fff;" font-family="Arial" font-size="16px"> members</text>
   <rect width="106" height="20" x="280" y="68" style="fill:none;stroke:black;"/>
   <text width="106" height="20" x="285" y="82" style="fill:black;" font-family="Arial" font-size="16px">biography</text>
   <rect width="106" height="20" x="280" y="88" style="fill:none;stroke:black;"/>
   <text width="106" height="20" x="285" y="102" style="fill:black;" font-family="Arial" font-size="16px">work</text>
   <rect width="106" height="20" x="280" y="108" style="fill:none;stroke:black;"/>
   <text width="106" height="20" x="285" y="122" style="fill:black;" font-family="Arial" font-size="16px">specialization</text>
   <rect width="106" height="20" x="280" y="128" style="fill:none;stroke:black;"/>
   <text width="106" height="20" x="285" y="142" style="fill:black;" font-family="Arial" font-size="16px">country</text>
   <rect width="106" height="20" x="280" y="148" style="fill:none;stroke:black;"/>
   <text width="106" height="20" x="285" y="162" style="fill:black;" font-family="Arial" font-size="16px">phone</text>
   <rect width="106" height="20" x="280" y="168" style="fill:none;stroke:black;"/>
   <text width="106" height="20" x="285" y="182" style="fill:black;" font-family="Arial" font-size="16px">title</text>
   <rect width="106" height="20" x="280" y="188" style="fill:none;stroke:black;"/>
   <text width="106" height="20" x="285" y="202" style="fill:black;" font-family="Arial" font-size="16px">j_id</text>
   <rect width="106" height="20" x="280" y="208" style="fill:none;stroke:black;"/>
   <text width="106" height="20" x="285" y="222" style="fill:black;" font-family="Arial" font-size="16px">roles</text>
   <rect width="106" height="20" x="280" y="228" style="fill:none;stroke:black;"/>
   <text width="106" height="20" x="285" y="242" style="fill:black;" font-family="Arial" font-size="16px">lan1</text>
   <rect width="106" height="20" x="280" y="248" style="fill:none;stroke:black;"/>
   <text width="106" height="20" x="285" y="262" style="fill:black;" font-family="Arial" font-size="16px">lan2</text>
   <rect width="106" height="20" x="280" y="268" style="fill:#aea;stroke:black;"/>
   <text width="106" height="20" x="285" y="282" style="fill:black;" font-family="Arial" font-size="16px">user_id</text>
   <rect width="106" height="20" x="280" y="288" style="fill:none;stroke:black;"/>
   <text width="106" height="20" x="285" y="302" style="fill:black;" font-family="Arial" font-size="16px">p_id</text>
   <rect width="106" height="20" x="280" y="308" style="fill:none;stroke:black;"/>
   <text width="106" height="20" x="285" y="322" style="fill:black;" font-family="Arial" font-size="16px">app_id</text>
   <rect width="153" height="20" x="878" y="207" style="fill:#007;stroke:black;"/>
   <text width="153" height="20" x="883" y="221" style="fill:#fff;" font-family="Arial" font-size="16px"> member_details_view</text>
   <rect width="153" height="20" x="878" y="227" style="fill:none;stroke:black;"/>
   <text width="153" height="20" x="883" y="241" style="fill:black;" font-family="Arial" font-size="16px">biography</text>
   <rect width="153" height="20" x="878" y="247" style="fill:none;stroke:black;"/>
   <text width="153" height="20" x="883" y="261" style="fill:black;" font-family="Arial" font-size="16px">work</text>
   <rect width="153" height="20" x="878" y="267" style="fill:none;stroke:black;"/>
   <text width="153" height="20" x="883" y="281" style="fill:black;" font-family="Arial" font-size="16px">specialization</text>
   <rect width="153" height="20" x="878" y="287" style="fill:none;stroke:black;"/>
   <text width="153" height="20" x="883" y="301" style="fill:black;" font-family="Arial" font-size="16px">country</text>
   <rect width="153" height="20" x="878" y="307" style="fill:none;stroke:black;"/>
   <text width="153" height="20" x="883" y="321" style="fill:black;" font-family="Arial" font-size="16px">phone</text>
   <rect width="153" height="20" x="878" y="327" style="fill:none;stroke:black;"/>
   <text width="153" height="20" x="883" y="341" style="fill:black;" font-family="Arial" font-size="16px">title</text>
   <rect width="153" height="20" x="878" y="347" style="fill:none;stroke:black;"/>
   <text width="153" height="20" x="883" y="361" style="fill:black;" font-family="Arial" font-size="16px">j_id</text>
   <rect width="153" height="20" x="878" y="367" style="fill:none;stroke:black;"/>
   <text width="153" height="20" x="883" y="381" style="fill:black;" font-family="Arial" font-size="16px">roles</text>
   <rect width="153" height="20" x="878" y="387" style="fill:none;stroke:black;"/>
   <text width="153" height="20" x="883" y="401" style="fill:black;" font-family="Arial" font-size="16px">lan1</text>
   <rect width="153" height="20" x="878" y="407" style="fill:none;stroke:black;"/>
   <text width="153" height="20" x="883" y="421" style="fill:black;" font-family="Arial" font-size="16px">lan2</text>
   <rect width="153" height="20" x="878" y="427" style="fill:none;stroke:black;"/>
   <text width="153" height="20" x="883" y="441" style="fill:black;" font-family="Arial" font-size="16px">user_id</text>
   <rect width="153" height="20" x="878" y="447" style="fill:none;stroke:black;"/>
   <text width="153" height="20" x="883" y="461" style="fill:black;" font-family="Arial" font-size="16px">p_id</text>
   <rect width="153" height="20" x="878" y="467" style="fill:none;stroke:black;"/>
   <text width="153" height="20" x="883" y="481" style="fill:black;" font-family="Arial" font-size="16px">app_id</text>
   <rect width="153" height="20" x="878" y="487" style="fill:none;stroke:black;"/>
   <text width="153" height="20" x="883" y="501" style="fill:black;" font-family="Arial" font-size="16px">paper_title</text>
   <rect width="153" height="20" x="878" y="507" style="fill:none;stroke:black;"/>
   <text width="153" height="20" x="883" y="521" style="fill:black;" font-family="Arial" font-size="16px">username</text>
   <rect width="153" height="20" x="878" y="527" style="fill:none;stroke:black;"/>
   <text width="153" height="20" x="883" y="541" style="fill:black;" font-family="Arial" font-size="16px">application_name</text>
   <rect width="67" height="20" x="512" y="373" style="fill:#007;stroke:black;"/>
   <text width="67" height="20" x="517" y="387" style="fill:#fff;" font-family="Arial" font-size="16px"> papers</text>
   <rect width="67" height="20" x="512" y="393" style="fill:#aea;stroke:black;"/>
   <text width="67" height="20" x="517" y="407" style="fill:black;" font-family="Arial" font-size="16px">p_id</text>
   <rect width="67" height="20" x="512" y="413" style="fill:none;stroke:black;"/>
   <text width="67" height="20" x="517" y="427" style="fill:black;" font-family="Arial" font-size="16px">title</text>
   <rect width="67" height="20" x="512" y="433" style="fill:none;stroke:black;"/>
   <text width="67" height="20" x="517" y="447" style="fill:black;" font-family="Arial" font-size="16px">abstract</text>
   <rect width="67" height="20" x="512" y="453" style="fill:none;stroke:black;"/>
   <text width="67" height="20" x="517" y="467" style="fill:black;" font-family="Arial" font-size="16px">year</text>
   <rect width="67" height="20" x="512" y="473" style="fill:none;stroke:black;"/>
   <text width="67" height="20" x="517" y="487" style="fill:black;" font-family="Arial" font-size="16px">file</text>
   <rect width="67" height="20" x="512" y="493" style="fill:none;stroke:black;"/>
   <text width="67" height="20" x="517" y="507" style="fill:black;" font-family="Arial" font-size="16px">app_id</text>
   <rect width="67" height="20" x="512" y="513" style="fill:none;stroke:black;"/>
   <text width="67" height="20" x="517" y="527" style="fill:black;" font-family="Arial" font-size="16px">state</text>
   <rect width="67" height="20" x="512" y="533" style="fill:none;stroke:black;"/>
   <text width="67" height="20" x="517" y="547" style="fill:black;" font-family="Arial" font-size="16px">mem_id</text>
   <rect width="67" height="20" x="512" y="553" style="fill:none;stroke:black;"/>
   <text width="67" height="20" x="517" y="567" style="fill:black;" font-family="Arial" font-size="16px">lan</text>
   <rect width="81" height="20" x="56" y="308" style="fill:#007;stroke:black;"/>
   <text width="81" height="20" x="61" y="322" style="fill:#fff;" font-family="Arial" font-size="16px"> users</text>
   <rect width="81" height="20" x="56" y="328" style="fill:#aea;stroke:black;"/>
   <text width="81" height="20" x="61" y="342" style="fill:black;" font-family="Arial" font-size="16px">id</text>
   <rect width="81" height="20" x="56" y="348" style="fill:none;stroke:black;"/>
   <text width="81" height="20" x="61" y="362" style="fill:black;" font-family="Arial" font-size="16px">username</text>
   <rect width="81" height="20" x="56" y="368" style="fill:none;stroke:black;"/>
   <text width="81" height="20" x="61" y="382" style="fill:black;" font-family="Arial" font-size="16px">password</text>
   <rect width="81" height="20" x="56" y="388" style="fill:none;stroke:black;"/>
   <text width="81" height="20" x="61" y="402" style="fill:black;" font-family="Arial" font-size="16px">email</text>
</svg>

## Usage 🛣️:

To interact with the Research Papers Publishing Portal, navigate to the following sections:

- **[Home Page](http://localhost/ITSE412-fall23-r12/index.html)**
  - Explore the main landing page of the portal.

### MPA (Multi-Page Application):

- **User:**
  - **[Admin](http://localhost/ITSE412-fall23-r12/client/admin.html)**
    - Access the admin panel.
  - **[Register](http://localhost/ITSE412-fall23-r12/client/register.html)**
    - Register a new account.
  - **[Login](http://localhost/ITSE412-fall23-r12/client/login.html)**
    - Log in to your account.

- **Members:**
  - **[Add Members](http://localhost/ITSE412-fall23-r12/client/add-member.html)**
    - Add new members.
  - **[View Members](http://localhost/ITSE412-fall23-r12/client/veiw-members.html)**
    - View existing members.

### SPA (Single-Page Application):

- **[Applications](http://localhost/ITSE412-fall23-r12/client/applicationform.html)**
  - Access the applications section.
- **[Papers](http://localhost/ITSE412-fall23-r12/client/papers.html)**
  - Browse through research papers.
- **[Journals](http://localhost/ITSE412-fall23-r12/client/Journals.html)**
  - Explore journals related to various topics.

Feel free to navigate through the different sections of the portal to explore its features and functionalities.

## Any further Questions! Contact Us 🤙:

| Name                   | GitHub Account                              | Email                      |
|------------------------|---------------------------------------------|----------------------------|
| Mohamed Abughrara      | [mabughrara](https://github.com/Mohamed-Abughrara)| sabughrara@gmail.com |
| Ali Alghanay           | [alialghanay](https://github.com/alialghanay)| a.al-ghanay@uot.edu.ly |
| Ahmed Elmahjoub        | [ahmedelmahjoub](https://github.com/Ahmed-Elmahjoub)| a.elmahjoub@uot.edu.ly |
| Anas Almograbi         | [anasalmograbi](https://github.com/Anas-mag)| anas.almograbi@uot.edu.ly |
| Abulqasim Tarhouni   | [abulqasim](https://github.com/Abulqasim-Tarhouni)| abu.altarhouni@uot.edu.ly  |
| Aymen Altajoury        | [aymenaltajoury](https://github.com/Al-tajoury)| a.tajoury@uot.edu.ly |
