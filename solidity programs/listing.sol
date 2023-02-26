pragma solidity 0.4.25;
contract listing{

    
    int listing_id;
    string category;
    string title;
    int target;

    
    function addListing(int lid, string cat, string ttl, int tar) public {
        listing_id = lid;
        category = cat;
        title = ttl;
        target = tar;
    }
    
    
    function getListing() view public returns(int lid,string cat,string ttl,int tar){
        return (listing_id,category,title,target);
    }
    
}