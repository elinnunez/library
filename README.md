List of goals by checkpoint (DUE APRIL 5):

	. Build front end of database
	. Data entry forms (CRUD)
	. Data queries (at least 3)
	. Data reports (at least 3)
	. Triggers to database (at least 2)
	. Hosted web application
	
	.Email web link to TAs and uramamur@bcm.edu

-------------------------------------------------------------------------------------------------------

List of jobs to accomplish (NOT ALL NEED TO BE FINISHED TO SATISFY CHECKPOINT 3):

	OPEN => Job is currently not being worked on by anyone
	WIP  => Job is currently assigned to someone, but not completed
	Comp => Job is completed

	*If you decide to take a job make sure to announce such in the discord and update this document accordingly
	
	User Interface:

		. Log/Sign up - (Completed)
		. Home Page   - (Completed)
		. About Page  - (OPEN)
		. Catalog     - (WIP)
		. Admin Dash  - (WIP)
		. User Dash   - (WIP)

	Database/PHP:

		.Log/Sign up verification - (OPEN)
		.Log/Sign up error handle - (OPEN)
		.Home Page Search Elements- (OPEN)
		.Catalog Search Elements  - (OPEN)
		.Catalog Book Request     - (OPEN)
		.User Dashboard Elements  - (OPEN)
		.Admin Dashboard Elements - (WIP)
		.Adding Triggers          - (OPEN)

	Hosted Server Set Up              - (OPEN) *Hunter will try to start working on this during the weekend otherwise
	
-------------------------------------------------------------------------------------------------------

Important Information:

	
	Nameing convention for .css:
	
		When working on the html make sure to follow a similar naming scheme to minimalize conflicts (Example taken from index.php)

		<div class="search">
          		<div class="search-container">
            			<form action="/insertlink.php">
              				<button type="submit">
				</form>
			</div>
		</div>


		To address the "button" element in css:

			.search .search-container button{}

-------------------------------------------------------------------------------------------------------

	How to apply the header and footer to your pages:

		When adding the header and footer, take note of the following formatting to avoid conflicts:

			<html>
				<body>
					<div class="page-content">
						<div class="*YOUR PAGE*">
							*HTML CONTENT
						</div>
					</div>
				</body<
			<html>


		In your .php file add the following to apply the header and footer:

			
			<?php
    				include_once 'header.php';
			?>	

				<div class="page-content">
					*YOUR HTML CODE
				</div>

			<?php
    				include_once 'footer.php';
			?>	

-------------------------------------------------------------------------------------------------------

	Information regarding user dashboard:
		
		The user dashboard will consist of a few data entry and queries that allow the user to do the following:

			.Change personal information (Name, DOB, password, etc)
			.View all current book requests they have and be able to cancel them
			.View current holds/fines
			.View notifications from system (info about a hold that was place, or a request being canceled) - Example of "above and beyond" code, not needed for minimum requirements



	
