# Okle

Okle is an e-commerce web app. This web app mainly implements e-commerce affiliation marketing concepts side of things.
This is a personal project that i work on in my free time so don't expect stable commits if you want to watch the repo.

## Getting Started

These instructions will get you a copy of the project up and running on your local machine for development.

### Prerequisites

To run this app you need to have below technologies:

#### Set up the environment

Visit https://laravel.com/docs/5.2 for a detailed documentation on how to install it.
It is recommended to install the vagrant box Homestead optimized to run laravel apps.
The below gives you the basic instructions on how to install Homestead. visit https://laravel.com/docs/5.4/homestead for a detailed documentation.

##### Make Sure You Have:

- [VirtualBox](https://www.virtualbox.org/wiki/Downloads)
- or [VMWare](https://www.vmware.com/)
- or [Parallels](http://www.parallels.com/products/desktop/)
- [Vagrant](https://www.vagrantup.com/downloads.html)

You only to have one of these VirtualBox, or VWware or Parallels and then have Vagrant as well. If you have those installed move to the below instructions.

### Installing The Homestead Vagrant Box

```
vagrant box add laravel/homestead
```
### Create The Homestead.yaml configuration file

```
// Mac or Linux
bash init.sh

// windows
init.bat
```
### Configuring Homestead

Locate the Homestead.yaml file we just created. It should be in ```~/.homestead/Homestead.yaml``` for mac and linux users,for window users check in ```/users``` or ```/Documents```,it really depends on where you downloaded everything from.

### Setting Your Provider

The provider key in your ~/.homestead/Homestead.yaml file indicates which Vagrant provider should be used: virtualbox, vmware_fusion, vmware_workstation, or parallels. You may set this to the provider you prefer:

```
provider: virtualbox
```

### Configuring Shared Folders

Create a folder which files will be synced between your local machine and the Homestead environment.
Mine is assumed to be named "Code"

```
folders:
	- map: ~/Code
	  to : /home/vagrant/Code
```

### Configuring Nginx Sites

If you change the sites property after provisioning the Homestead box, you should re-run
``` vagrant reload --provision ``` to update the Nginx configuration on the virtual machine

```
sites:
   - map: okle.app
     to: /home/vagrant/Code/okle/public
```

### Edit The Hosts File

For Mac or linux users, this file is located at ``` /etc/hosts ```. on Windows, it is located at``` C:\Windows\System32\drivers\etc\hosts ```.

```
192.168.10.10 okle.app
```
### Launch and view the APP

```
http://okle.app
```
### Connecting to Databases

A ``` homestead ``` database is configured for both MYSQL and Postgres out of the box.

```
mysql -u homestead -p
password: secret
```

## Built With

* [Laravel Framework](https://laravel.com/docs/5.2) - web framework used

## Authors

* **Christophe Mutabazi** - *Initial work* - [Personalwebsite](http://orbit.surge.sh/)

## License

This project is a personal project. You can clone the repo but if you like the idea and want to contribute contact me first.
