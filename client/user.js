function User(username, password, email, profilepic, products, videos, images,followers,contacts,conv,strarred,description,language) {
    var xhr = new XMLHttpRequest();
    
    this.profilepic = profilepic
    this.email = email
    this.videos = videos
    this.images = images
    this.products = products
    this.password = password
    this.username = username
    this.followers = followers
    this.contacts = contacts
    this.conv = conv
    this.strarred = strarred
    this.description = description
    this.language = language
    
    xhr.onreadystatechange = function() {
	    if (xhr.readyState == 4 && (xhr.status == 200 || xhr.status == 0)) {
	//	    alert(xhr.responseText); // C'est bon \o/
	     }
    };
    
    this.setProfilePic  = function() {
        
    }

    this.getProfilePic = function() {
         return this.profilepic;
    }

    this.getEmail = function() {
        return this.email;
    }

    this.setEmail = function() {
    },

    this.newVideo = function() {
    
    },

    this.deleteVideo = function() {
        
    },

    this.newImage = function() {
        
    },

    this.getProduct = function() {
        return this.product;
    },

    this.addProduct = function() {
    },

    this.changePassword = function() {
    
    },

    this.getFollowers = function() {
        return this.followers;
    },

    this.getFollowed = function() {
    
    },

    this.getAddress = function() {
     //   return this.add
    },

    this.newAddress = function() {
    
    },

    this.getContact = function() {
        return this.contacts
    },

    this.newContact = function() {
    
    },

    this.deleteContact = function() {
    
    },

    this.blockUser = function() {
    
    },
    
    this.addConv = function() {

    },
    
    this.getNotification = function() {
        
    },
    
    this.getStrarred = function() {
        return this.strarred
    },
    
    this.newStrarered = function() {
        
    },
    
    this.getDescription = function() {
        return this.description
    },
    
    this.setDescription = function() {
        
    },
    
    this.setLanguage = function () {
        
    }
}

function createUser(username,password,email) {
    var xhr = getXMLHttpRequest();
    var user = null
    
    xhr.onreadystatechange = function() {
	    if (xhr.readyState === 4 && (xhr.status === 200 || xhr.status === 0)) {
		    user = new User(username,password)
	     }
    };

    xhr.open("GET", "http://cyber9.ddns.net/eCommerce/server/signin.php?par={'username':" + username + "',password:'" + password + "," + "'email':" + email + "}", true);
    xhr.send(null);

    if(typeof(Storage) !== "undefined") {
    } else {
    }
    
    return user
}

function login(username,password, onres) {
    var xhr = new XMLHttpRequest();
    var user = null
    
    xhr.onreadystatechange = function() {
	    if (xhr.readyState === 4 && (xhr.status === 200 || xhr.status === 0)) {
	        var res = JSON.parse(xhr.responseText)
         
            
	        if(res.ok) {
		        user = new User(username,password,null,null,null,null,null,null,null,null,null,null,null)
		    
		        if(typeof(Storage) !== "undefined") {
                } else {
                }
	        } else {
	            user = new Error(res.r_error);
	        }
	        
            onres(user);
	     }
    };

    xhr.open("GET", 'http://cyber9.ddns.net/eCommerce/server/login.php?arg={"username":"' + username + '","password":"' + password + '"}', true);
    xhr.send(null);

}

function logout() {
    
}