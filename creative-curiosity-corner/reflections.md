# CSCI 2170: Assignment Creative Curiosity Corner

## 1. Student Details

* Full Name: Malhar Datta Mahajan
* Dal Email: ml575444@dal.ca
* B00 ID: 934337

## 2. Introducing the Creative Curiosity Corner

In addition to completing the main requirements for each assignment, here’s an invitation to explore beyond the task at hand through the Creative Curiosity Corner. This is an opportunity for you to demonstrate creative thinking and curiosity about the topics we are learning. Creative Curiosity Corner a space for you to experiment, explore, and challenge yourself with concepts related to the assignment, but not directly part of the main requirements. This could involve:

* Expanding on a specific idea that caught your attention
* Testing out a new technique you haven’t had the chance to explore
* Applying the material in a creative way that goes beyond the instructions

We learn best by trying new things, making mistakes, and pushing beyond what feels comfortable. This is how we grow as learners, and it’s also how we build resilience. The Creative Curiosity Corner gives you the freedom to experiment without the pressure of perfection. It’s a chance to take risks, learn from them, and bounce back when things don’t work out as planned. The goal isn’t just to get things right—it’s about developing your problem-solving skills, embracing the unknown, and becoming more confident when facing challenges.

### 2.1. Grading: The focus is on learning and experimentation: not correctness

* Grading for `creative-curiosity-corner` is not based on something working or being correct. It is about encouraging you to learn beyond boundaries!
* The code and reflections will be graded as a bonus component of the assignment, making you eligible to receive a grade of __*exceeds expectations*__ in case all other assignment components are complete.
* In case other assignment components are not complete, you are eligible to get the next level of the grade.
  * For example, if your grade was “Incomplete, does not meet expectations yet”, you could receive a grade of “Incomplete, has scope for improvements”.

## 3. Reflections

### 3.1. What did you do in this creative curiosity corner activity? (at least 250 words)

In this Creative Curiosity Corner activity, I added a search functionality to the index.php file, allowing users to search their journal entries by keywords. This enhances the basic journal entry system by making it easier to locate specific entries, especially for users with many entries(I reccomend using test username: mafia test2, test password: Testpassword123).

I implemented a live search feature using JavaScript, where each journal entry’s title and body were stored as data attributes. The search bar dynamically filters entries in real-time based on the user’s input, hiding non-matching entries.

This feature improves the usability and interactivity of the journal system. It involved adding a search input field and writing a JavaScript script to efficiently filter entries as the user types. Overall, the search bar provides a significant enhancement to the user experience, adding a practical feature commonly found in advanced applications.

### 3.2. Why did you choose to do this? (at least 100 words)

I decided to add the search as its always a nice little touch of practicality for UX in event handling applications where there are loads and loads of items that user may be expected to manage. Manually searching through journal entries can be tedious and ineffective. This capability reduces that need considerably, and saves users time when they are looking for specific content. Moreover, this exercise was a vehicle for me to learn more about JavaScript working with HTML in relation to DOM manipulation at runtime. This was also a great exercise for working with dynamic filtering of data, which can come up in most web typescale applications.

### 3.3. How it connects to this assignment? (no word limit; bullet points encouraged)

	•	The search functionality is an extension of the journal entry system that was required for the assignment.
	•	It connects to the concept of managing and displaying data (journal entries) but introduces an interactive way for users to filter through that data.
	•	This search bar adds to the user interface and enhances the overall usability of the journal application by allowing keyword-based searches.
	•	The implementation demonstrates how to use JavaScript alongside PHP and HTML to create a more dynamic and responsive web application.

### 3.4. What worked and what didn’t? (no word limit; bullet points encouraged)

	•	The live filtering of journal entries based on the input in the search bar worked effectively.
	•	The combination of JavaScript, HTML data attributes, and PHP-generated content allowed for seamless interaction without needing page reloads.
	•	The search functionality updated in real-time, providing immediate feedback to the user.

### 3.5. What did you tried to fix? (no word limit; bullet points encouraged)

	•	Initially, there were some performance issues when handling larger datasets due to the approach of looping through all entries. I resolved this by optimizing the loop and filtering process.
	•	The search function was case-sensitive at first, but after realizing this, I adjusted the code to handle case-insensitive searches.

### 3.6. References/Citations: What additional resources did you use, and why? (no word limit; bullet points encouraged)

	•	MDN Web Docs: I referred to the MDN documentation on how to use the addEventListener method and manipulate the DOM for real-time updates. It helped me understand the best practices for handling input events and dynamically updating HTML content.
	•	W3Schools: I also used W3Schools for basic references on JavaScript event handling and DOM manipulation. This was useful in confirming how to use getAttribute to retrieve the title and body content of each entry.

### 3.7 What did you learn from this experience? (at least 150 words)

This activity taught me how to integrate JavaScript and HTML such that live interaction could be enabled without any need for page reloads. I learned more about DOM manipulation and event listeners which gave me insight so that future web applications would become dynamic regarding user interaction. And I also witnessed the necessity of writing code in a manner that can be executed on large datasets, inefficient loops and processes will easily bring performance issues.

It also taught me how to handle edge cases when it comes user input — case sensitivity, and empty searches for example in order to improve the search functionality. In general, I branded JavaScript as friendlier in UI improvements and UX boosting of web apps. This cool project forced me to dig deeper into making our applications more dynamic, more interactive and responsive on certain user behavior.
