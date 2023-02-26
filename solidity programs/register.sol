pragma solidity 0.4.25;
contract register{
    
    string mail;
    string uname;
    string mobileno;
    string addres;

    
    function userRegistration(string email,string name,string mobile,string addr) public {
        mail = email;
        uname = name;
        mobileno = mobile;
        addres = addr;
    }
    
    
    function getRegisteredUser() view public returns(string email,string name,string mobile,string addr){
        return (mail,uname,mobileno,addres);
    }
    
}