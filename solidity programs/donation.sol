pragma solidity 0.4.25;
contract donation{
    
    string from_account;
    string to_account;
    int amount;
    int to_listingID;


    function makeDonation(int lid,string from_email,string to_email,int amt) public{
        from_account = from_email;
        to_account = to_email;
        amount = amt;
        to_listingID = lid;
    }
    
    function getDonation() view public returns(int lid,string from_email,string to_email,int amt){
        return (to_listingID,from_account,to_account,amount);
    }
    
}