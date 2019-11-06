# SouthfaceEquityEvaluator
Southface Equity Evaluator, Georgia Tech CS Junior Design - Team 9327

## Running the Project

The Southface Equity Evaluator utilizes a bundled vagrant virtual machine for development and deployment. To utilize this VM you will need 2 pieces of software: [Vagrant](https://releases.hashicorp.com/vagrant/2.2.6/) (tested on version 2.2.6) & [VirtualBox](https://www.virtualbox.org/wiki/Downloads) (tested on version 6.0.14 r133895 (Qt5.6.2)).

To start the VM and run the project from your local machine, open terminal and navigate to the project root, then enter:
```
vagrant up
```
Once the VM starts, the project website running on the VM can be viewed by navigating in your web-browser to http://192.168.10.10 

Alternatively, you can map a hostname to the VM by modifying the HOST file in your operating system to include a variation of the code below:
```
192.168.10.10  equityevaluator.local
```

To login to vagrant, enter:
```
vagrant ssh
```

To shutdown the VM, enter:
```
vagrant halt
```

## Configuring your Homestead YAML

The VM for the Southface Equity Evaluator is based on Laravel Homestead. File paths and other assignments are made in the Homestead YAML file. By default the project is setup to run on Windows when the root is placed inside the C:\ directory, ex. "C:\SouthfaceEquityEvaluator"

To change the default location of the project, open the Homestead YAML file in a text editor and modify the following line (line 10) to point to your project root directory:
```
        map: 'C:\SouthfaceEquityEvaluator'
```
<b>The YAML file is very sensitive to changes. Do not use tab characters or change any other lines. Doing so may break the project.</b>

If you make changes to the YAML file, the vagrant VM will need to be reconfigured. To do this, open terminal and navigate to the project root, then enter:
```
vagrant reload --provision
```
## License

The Laravel framework is open-source software licensed under the [MIT license](https://opensource.org/licenses/MIT).
