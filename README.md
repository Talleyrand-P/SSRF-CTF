# SSRF-CTF
A small SSRF CTF using a vulnerable PHP script. The goal is to read the passwd file.

To download the code use the command

```git clone https://github.com/Talleyrand-P/SSRF-CTF```

Make sure you have docker installed, navigate to the SSRF-CTF directory and run the following command

```docker build .```

```docker run -p 8080:80 <the_id_from_build>```

The CTF will now be running. You can access it by going to

```http://0.0.0.0:8080/index.php```

To stop it once you are finished use the below commands

```docker ps```

```docker stop <containter_id_of_the_CTF>```
