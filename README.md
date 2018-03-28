# cloud
        CC Mini project : Data storage management using cloud for Online store
 
Title: Implement data storage management for online store using cloud services.

Introduction: The term storage management encompasses the technologies and processes organizations use to maximize or improve the performance of their data storage resources. It is a broad category that includes virtualization, replication, mirroring, security, compression, traffic analysis, process automation, storage provisioning and related techniques. 
OwnCloud : ownCloud is a suite of client–server software for creating file hosting services and using them. ownCloud is functionally very similar to the widely used Dropbox, with the primary functional difference being that the Server Edition of ownCloud is free and open-source, and thereby allowing anyone to install and operate it without charge on a private server. It also supports extensions that allow it to work like Google Drive, with online document editing, calendar and contact synchronization, and more. Its openness avoids enforced quotas on storage space or the number of connected clients, instead having hard limits (like on storage space or number of users) defined only by the physical capabilities of the server.

Implementation Details:
The cloud storage management portal mechanism provides a feature for data owners to publish and share data with other cloud consumers inside or outside of the cloud environment. Here we have one original file from which users can access data and on increasing number of requests file gets replicated based on some threshold value and users can access now from newly replicated files,by doing this we can manage the load or traffic on cloud. Also, we have divided MySQL data, i.e, tuples of table (500 tuples) into equal sized files (1 KB) on cloud in the form of buckets. Using form.html file we fetch the number of requests made by the user and using action.php we fetch the request and if  no of request exceed the threshold value the data is replicated .



Conclusion: Data management is implemented using PHP script in which as soon as ore users try to access the files present on cloud, the files are replicated and the new users access the new file. In this way, elasticity is shown in ownCloud. Data from MySQL is fetched and Buckets of  1 KB are created and stored on OwnCloud.

#start apache and MySQL server from xamp.
#save action.php.
#run form.html.
#run connect.php.
