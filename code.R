# PACKAGES ##############################################################################
install.packages("usethis")

# GO #############################################################################
library(usethis)
library(httr)

# IMPORT #####################################################
# Import 'crime_expend_MA.csv' via Envirionment.
library(readr)
data <- read.csv("C:/Users/User/duke data science/MIDS_Data/descriptive_exercise/crime_expend_MA.csv")

# EX 2 ################################################################################################################
require(dplyr)

# V01 ##################################################################################################################
Ex2c04 <- filter(data, data$county_code==4) 
Ex2c10 <- filter(data, data$county_code==10)

mean(Ex2c04$policeexpenditures)
mean(Ex2c04$crimeindex)

mean(Ex2c10$policeexpenditures)
mean(Ex2c10$crimeindex)

# V02 ################################################################################################################
SelCou <- c(4, 10)
n1 <- length(SelCou)
MPolEx <- rep(NA, length(SelCou))
MCriIn <- rep(NA, length(SelCou))

for (i in 1:n1){
  temdat <- filter(data, data$county_code==SelCou[i]) 
  MPolEx[i] <- round(mean(temdat$policeexpenditures), digits=2)
  MCriIn[i] <- round(mean(temdat$crimeindex), digits=2)
  print(paste("For county", SelCou[i], ",", "average policing expenditure is", MPolEx[i], 
              "and average crime index is", MCriIn[i]))
}

write.csv(data,"C:/Users/User/duke data science/class 20200115/exercise.csv", row.names = FALSE)

