View the video: [https://youtu.be/PGKa8zPeFfY](https://youtu.be/PGKa8zPeFfY)

# Rest API with CRUD Application

Now that we have looked at the custom PHP REST API, we need to create documentation. To do this, I will be using Swagger UI. In this tutorial, we go over how to install Swagger and Swagger PHP in order to dynamically populate your interactive documentation.

With Swagger, you can create documentation for your REST API that is detailed, useful and allows your developers to test in realtime.

Swagger UI is free and easy to get started with. So, let's install Swagger and start documenting our API. Now we will start building out the comments that will create the dynamic documentation the showcase the REST API usage.

This documentation is user-friendly and interactive so your developers can work directly with the API based on the needs of your code. This tutorial will give over the usage of OpenAPI GET, PUT, POST, and DELETE so you can label and use your API documentation correctly.

Now, let's take what we learned and use our API to create and remove pages within our SammyJS application.

A few weeks ago, we created a REST API driven application that uses SammyJS to create pages from a MySQL database. Today, we take what we did and add in the additional functionality from our CRUD API to build a function that automatically creates and removes SammyJS page templates.

Essentially, you can use this to build a front end website using AJAX and your REST API with one code base, no more needing to create page templates manually, let the API create your page templates for you.

Now, we learn how to add JWT tokenization to our RESTful API.

We use Firebase JWT to create and retrieve a simple token that can be used to validate users, external websites, and make your API more secure. We also turn on tokenization in our Swagger UI and allow users to generate a token that can be used to authorize our other routes using a GUI.

Finally, we will use AJAX to make a request to the API to secure a token that can be used to view the pages and header content. The token will be generated server-side and sent to our app to be stored within the browser session. This will ensure every hit to our API is from a secured source.
